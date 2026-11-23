<?php

declare(strict_types=1);

namespace MattRyan\Site;

use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RuntimeException;

/**
 * Builds the static site into the output directory:
 *
 *   1. empties the output directory
 *   2. renders every content/pages/*.php file through its layout
 *   3. copies assets/ verbatim
 *   4. writes sitemap.xml, robots.txt, .nojekyll and (optionally) CNAME
 */
final class Builder
{
    /** @var list<Page> */
    public private(set) array $pages = [];

    public function __construct(
        private readonly Site $site,
        private readonly string $outDir,
    ) {
    }

    public function build(): void
    {
        $this->cleanOutput();
        $this->pages = $this->loadPages();

        foreach ($this->pages as $page) {
            $html = $this->renderTemplate('layouts/' . $page->layout, ['page' => $page]);
            $this->write($page->outputFile, $html);
        }

        $this->copyDirectory($this->site->rootDir . '/assets', $this->outDir . '/assets');
        $this->write('sitemap.xml', $this->sitemap());
        $this->write('robots.txt', "User-agent: *\nAllow: /\n\nSitemap: " . $this->site->absoluteUrl('sitemap.xml') . "\n");
        $this->write('.nojekyll', '');

        if ($cname = $this->site->get('cname')) {
            $this->write('CNAME', $cname . "\n");
        }
    }

    /** @return list<Page> */
    private function loadPages(): array
    {
        $files = glob($this->site->rootDir . '/content/pages/*.php') ?: [];
        sort($files);

        return array_map(function (string $file): Page {
            $page = new Page(basename($file, '.php'), $file, $this->site->name);
            // The content file sets $page properties and echoes its body.
            $page->content = $this->capture($file, ['page' => $page]);
            return $page;
        }, $files);
    }

    /**
     * Render templates/<name>.php with the given variables. $site and
     * $builder are always available.
     *
     * @param array<string, mixed> $vars
     */
    public function renderTemplate(string $name, array $vars = []): string
    {
        $file = $this->site->rootDir . "/templates/{$name}.php";
        if (!is_file($file)) {
            throw new RuntimeException("Template not found: templates/{$name}.php");
        }
        return $this->capture($file, $vars);
    }

    /** @param array<string, mixed> $vars */
    private function capture(string $__file, array $vars): string
    {
        $vars += ['site' => $this->site, 'builder' => $this];
        extract($vars, EXTR_SKIP);
        ob_start();
        try {
            include $__file;
            return (string) ob_get_clean();
        } catch (\Throwable $e) {
            ob_end_clean();
            throw $e;
        }
    }

    private function sitemap(): string
    {
        $urls = '';
        foreach ($this->pages as $page) {
            if ($page->inSitemap) {
                $urls .= "  <url><loc>" . e($this->site->absoluteUrl($page->path)) . "</loc></url>\n";
            }
        }
        return "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"
            . "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n{$urls}</urlset>\n";
    }

    private function write(string $relative, string $contents): void
    {
        $target = $this->outDir . '/' . $relative;
        if (!is_dir(dirname($target))) {
            mkdir(dirname($target), 0777, true);
        }
        file_put_contents($target, $contents);
    }

    private function cleanOutput(): void
    {
        if (is_dir($this->outDir)) {
            $items = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($this->outDir, FilesystemIterator::SKIP_DOTS),
                RecursiveIteratorIterator::CHILD_FIRST,
            );
            foreach ($items as $item) {
                $item->isDir() ? rmdir($item->getPathname()) : unlink($item->getPathname());
            }
        } else {
            mkdir($this->outDir, 0777, true);
        }
    }

    private function copyDirectory(string $from, string $to): void
    {
        $items = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($from, FilesystemIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST,
        );
        foreach ($items as $item) {
            $target = $to . '/' . substr($item->getPathname(), strlen($from) + 1);
            if ($item->isDir()) {
                is_dir($target) || mkdir($target, 0777, true);
            } else {
                is_dir(dirname($target)) || mkdir(dirname($target), 0777, true);
                copy($item->getPathname(), $target);
            }
        }
    }
}
