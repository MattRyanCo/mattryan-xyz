<?php

declare(strict_types=1);

/**
 * Site configuration — the one place for names, links and menus.
 *
 * Everything here is available in templates and content files via
 * $site->get('key') / $site->get('nested.key'). See docs/CONTENT.md.
 */
return [
    'name' => 'MattRyan.xyz',
    'language' => 'en-US',

    // Absolute URL of the published site, no trailing slash. Used for
    // canonical links, robots.txt and sitemap.xml. The GitHub Actions
    // workflow overrides this automatically with the real Pages URL.
    'site_url' => 'https://mattryanco.github.io/mattryan-xyz',

    // Path prefix the site is served under. "/" for local preview or a
    // custom domain; "/<repo>/" for a GitHub project page. The workflow
    // overrides this automatically.
    'base_path' => '/',

    // Custom domain for GitHub Pages (writes a CNAME file), e.g.
    // 'mattryan.xyz'. Leave null while using the github.io address.
    'cname' => null,

    'contact_email' => 'contact@mattryan.xyz',

    // Home page ("link tree").
    'home' => [
        'document_title' => 'MattRyan.xyz – Link Tree',
        'heading' => 'MATTRYAN.XYZ',
        'tagline' => 'WordPress Developer (Ret.)',
        'links_heading' => 'Links',
        // url may be absolute, site-relative ("friends/") or "mailto:".
        'links' => [
            ['label' => 'mattryan.co', 'url' => 'https://mattryan.co'],
            ['label' => 'Development Projects', 'url' => 'https://github.com'],
            ['label' => 'Social', 'url' => 'https://mastodon.social/@popryno'],
            ['label' => 'Contact', 'url' => 'mailto:contact@mattryan.xyz'],
        ],
    ],

    // Header navigation on inner pages.
    'nav' => [
        ['label' => 'Selected Projects', 'url' => 'https://github.com'],
        ['label' => 'Technical Essays', 'url' => 'https://substack.com'],
        ['label' => 'Direct Dispatch', 'url' => 'https://x.com'],
        ['label' => 'Contact Terminal', 'url' => 'mailto:contact@mattryan.xyz'],
    ],

    // Favicons (paths inside assets/).
    'icons' => [
        'small' => 'images/favicon-150.png',
        'large' => 'images/favicon-192.png',
    ],
];
