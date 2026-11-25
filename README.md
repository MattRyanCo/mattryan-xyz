# mattryan.xyz (static)

A static rebuild of the WordPress site at **https://mattryan.xyz**, generated
by a small, dependency-free **PHP 8.4** build script and published with
**GitHub Pages**.

There's no database, no CMS and no Composer packages: content is plain PHP/HTML
files, `php build.php` turns them into static HTML in `public/`, and a GitHub
Actions workflow deploys that folder on every push to `main`.

## Quick start

Requirements: PHP 8.4 or newer (CLI). Nothing else.

```sh
php build.php                      # build into ./public
php -S localhost:8000 -t public    # preview at http://localhost:8000
```

Edit a file, run `php build.php` again, refresh the browser.

## Pages

| URL                   | Source file                          | Layout    |
|-----------------------|--------------------------------------|-----------|
| `/`                   | `content/pages/index.php`            | `landing` |
| `/404.html`           | `content/pages/404.php`              | `page`    |

## Project layout

```
.
├── build.php              CLI entry point: php build.php [--base-path=] [--site-url=] [--out=]
├── config/site.php        Site name, URLs, home-page links
├── content/pages/         One PHP file per page (sets metadata, echoes HTML)
├── templates/
│   ├── layouts/           Full-page wrappers: landing.php, page.php
│   └── partials/          head (meta, styles, favicons)
├── src/                   The generator: Site, Page, Builder, helpers
├── assets/                Copied as-is to public/assets/ (CSS, fonts, images)
├── docs/                  Detailed documentation (start with ARCHITECTURE.md)
├── .github/workflows/     GitHub Pages deploy workflow
└── public/                Build output (git-ignored)
```

## Documentation

- [docs/ARCHITECTURE.md](docs/ARCHITECTURE.md) — how the generator works, end to end
- [docs/CONTENT.md](docs/CONTENT.md) — editing text and links, adding pages
- [docs/STYLES.md](docs/STYLES.md) — the CSS files, their order, and what's safe to edit
- [docs/BUILD.md](docs/BUILD.md) — build options, base paths, local preview
- [docs/DEPLOYMENT.md](docs/DEPLOYMENT.md) — GitHub Pages setup and custom domain
- [docs/MIGRATION.md](docs/MIGRATION.md) — what changed from the WordPress site

## Common tasks

| I want to…                         | Edit                                             |
|------------------------------------|--------------------------------------------------|
| Change a home-page button          | `config/site.php` → `home.links`                 |
| Add a page                         | new file in `content/pages/` (see CONTENT.md)    |
| Tweak styles                       | `assets/css/theme.css` (see STYLES.md)           |
| Use the mattryan.xyz domain        | `config/site.php` → `cname` (see DEPLOYMENT.md)  |
