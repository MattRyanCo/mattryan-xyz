<?php

declare(strict_types=1);

namespace MattRyan\Site;

/**
 * One page of the site.
 *
 * A Page is created by the Builder for every file in content/pages/. The
 * content file sets the public properties below (title, layout, ...) and
 * echoes its HTML body, which the Builder stores in $content.
 *
 * Uses PHP 8.4 property hooks and asymmetric visibility: the slug and
 * source file are fixed by the Builder, while derived values (URL path,
 * output file, <title>) are computed on read.
 */
final class Page
{
    /** Heading / short title, e.g. "Page not found". */
    public string $title = '';

    /**
     * Full <title> text. Defaults to "Title – Site Name"; the home page
     * overrides it explicitly.
     */
    public ?string $documentTitle = null {
        get => $this->documentTitle ?? ($this->title === '' ? $this->siteName : "{$this->title} – {$this->siteName}");
    }

    /** Meta description (optional). */
    public string $description = '';

    /** Template name in templates/layouts/ (without .php). */
    public string $layout = 'page';

    /** Whether the page is listed in sitemap.xml. */
    public bool $inSitemap = true;

    /** Rendered body HTML (set by the Builder). */
    public string $content = '';

    /** Site-relative URL path, e.g. "" for home or "about/". */
    public string $path {
        get => match ($this->slug) {
            'index' => '',
            '404' => '404.html',
            default => $this->slug . '/',
        };
    }

    /** Output file relative to the build directory. */
    public string $outputFile {
        get => match ($this->slug) {
            'index' => 'index.html',
            '404' => '404.html',
            default => $this->slug . '/index.html',
        };
    }

    public bool $isHome {
        get => $this->slug === 'index';
    }

    public function __construct(
        public private(set) string $slug,
        public private(set) string $sourceFile,
        private readonly string $siteName,
    ) {
    }
}
