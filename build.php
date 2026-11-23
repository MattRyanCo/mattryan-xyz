<?php

declare(strict_types=1);

/**
 * Static site build script.
 *
 * Usage:
 *   php build.php                         # build into ./public for local preview
 *   php build.php --base-path=/my-repo/   # build for a GitHub project page
 *   php build.php --site-url=https://example.com --out=dist
 *
 * Options (all optional; defaults come from config/site.php):
 *   --base-path  URL path prefix the site is served under ("/" or "/repo/")
 *   --site-url   Absolute URL used for canonical links and sitemap.xml
 *   --out        Output directory (default: public)
 *
 * See docs/BUILD.md for details.
 */

if (PHP_VERSION_ID < 80400) {
    fwrite(STDERR, "PHP 8.4 or newer is required (running " . PHP_VERSION . ").\n");
    exit(1);
}

spl_autoload_register(static function (string $class): void {
    $prefix = 'MattRyan\\Site\\';
    if (str_starts_with($class, $prefix)) {
        require __DIR__ . '/src/' . str_replace('\\', '/', substr($class, strlen($prefix))) . '.php';
    }
});
require __DIR__ . '/src/helpers.php';

use MattRyan\Site\Builder;
use MattRyan\Site\Site;

$options = getopt('', ['base-path:', 'site-url:', 'out:']);
$config = require __DIR__ . '/config/site.php';

$site = new Site(
    config: $config,
    rootDir: __DIR__,
    basePath: $options['base-path'] ?? getenv('SITE_BASE_PATH') ?: null,
    siteUrl: $options['site-url'] ?? getenv('SITE_URL') ?: null,
);

$outDir = $options['out'] ?? 'public';
if (!preg_match('#^([a-zA-Z]:)?[\\\\/]#', $outDir)) {
    $outDir = __DIR__ . '/' . $outDir;
}

$start = hrtime(true);
$builder = new Builder($site, $outDir);
$builder->build();

printf(
    "Built %d pages into %s (base path %s, site URL %s) in %.0f ms\n",
    count($builder->pages),
    $outDir,
    $site->basePath,
    $site->siteUrl,
    (hrtime(true) - $start) / 1e6,
);
