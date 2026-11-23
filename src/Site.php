<?php

declare(strict_types=1);

namespace MattRyan\Site;

/**
 * Site-wide settings and URL helpers, available to every template and
 * content file as $site.
 */
final class Site
{
    /** Path prefix the site is served under, always with leading and trailing slash ("/" or "/repo-name/"). */
    public private(set) string $basePath;

    /** Absolute origin + base path, without trailing slash (used for canonical URLs and the sitemap). */
    public private(set) string $siteUrl;

    /** @var array<string, string> cache of asset version hashes */
    private array $versions = [];

    /**
     * @param array<string, mixed> $config contents of config/site.php
     */
    public function __construct(
        public readonly array $config,
        public readonly string $rootDir,
        ?string $basePath = null,
        ?string $siteUrl = null,
    ) {
        $this->basePath = self::normalizeBasePath($basePath ?? $config['base_path'] ?? '/');
        $this->siteUrl = rtrim($siteUrl ?? $config['site_url'], '/');
    }

    public string $name {
        get => $this->config['name'];
    }

    /** Read a config value with dot notation, e.g. $site->get('home.tagline'). */
    public function get(string $key, mixed $default = null): mixed
    {
        $value = $this->config;
        foreach (explode('.', $key) as $part) {
            if (!is_array($value) || !array_key_exists($part, $value)) {
                return $default;
            }
            $value = $value[$part];
        }
        return $value;
    }

    /** Site-relative link: url('friends/') => "/friends/" (or "/repo/friends/"). External URLs pass through. */
    public function url(string $path = ''): string
    {
        if (preg_match('#^([a-z][a-z0-9+.-]*:|//|\#)#i', $path)) {
            return $path;
        }
        return $this->basePath . ltrim($path, '/');
    }

    /** Absolute URL for canonical links / sitemap. */
    public function absoluteUrl(string $path = ''): string
    {
        return $this->siteUrl . '/' . ltrim($path, '/');
    }

    /** URL of a file in assets/, with a content hash for cache busting. */
    public function asset(string $path): string
    {
        $path = ltrim($path, '/');
        $this->versions[$path] ??= substr(md5_file($this->rootDir . '/assets/' . $path) ?: '', 0, 8);
        return $this->url('assets/' . $path) . '?v=' . $this->versions[$path];
    }

    private static function normalizeBasePath(string $path): string
    {
        $path = trim($path, '/');
        return $path === '' ? '/' : "/{$path}/";
    }
}
