<?php

declare(strict_types=1);

/**
 * Template helpers. These are global functions so templates stay short.
 */

/** Escape text for HTML output. */
function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
}

/**
 * Attributes for an outbound link: opens in a new tab when the URL is
 * external (http/https to another host).
 */
function link_attrs(string $url): string
{
    $external = (bool) preg_match('#^https?://#i', $url);
    return $external ? ' target="_blank" rel="noopener noreferrer"' : '';
}
