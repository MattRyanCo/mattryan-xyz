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
    // workflow overrides this automatically with the real Pages URL
    // (currently https://www.ryno-net.com/mattryan-xyz — see docs/DEPLOYMENT.md).
    'site_url' => 'https://www.ryno-net.com/mattryan-xyz',

    // Path prefix the site is served under. "/" for local preview or a
    // custom domain; "/<repo>/" for a GitHub project page. The workflow
    // overrides this automatically.
    'base_path' => '/',

    // Custom domain for GitHub Pages (writes a CNAME file), e.g.
    // 'mattryan.xyz'. Leave null while using the github.io address.
    'cname' => 'mattryan.xyz',

    // Home page ("link tree").
    'home' => [
        'document_title' => 'MattRyan.xyz – Link Tree',
        'heading' => 'MattRyan.xyz',
        'tagline' => 'WordPress Developer (Ret.)',
        'short_description' => 'Direct digital index routing across systems, code, and writings.',
        'links_heading' => 'Links',
        // url may be absolute, site-relative ("about/") or "mailto:".
        'links' => [
            ['label' => 'mattryan.co', 'url' => 'https://mattryan.co'],
            ['label' => 'ilovetophotographflowers.com', 'url' => 'https://ilovetophotographflowers.com'],
            ['label' => 'COTA Directory', 'url' => 'https://directory.ascensionparkesburg.org/'],
            ['label' => 'Selected Projects on GitHub', 'url' => 'https://github.com/mattryanco/'],
            ['label' => 'Mastodon', 'url' => 'https://mastodon.social/@popryno'],
            ['label' => 'Contact', 'url' => 'mailto:contact@mattryan.xyz'],
        ],
    ],

    // Favicons (paths inside assets/).
    'icons' => [
        'small' => 'images/favicon-150.png',
        'large' => 'images/favicon-192.png',
    ],
];
