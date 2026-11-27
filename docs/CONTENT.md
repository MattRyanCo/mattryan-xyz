# Editing content

After any change: `php build.php`, then refresh `http://localhost:8000`
(see [BUILD.md](BUILD.md)). Commit and push to `main` to publish.

## Site settings — `config/site.php`

| Key | What it controls |
|-----|------------------|
| `name` | Site name in page titles. |
| `language` | `<html lang>`. |
| `site_url` | Absolute URL for canonical links and sitemap (overridden automatically in CI). |
| `base_path` | URL prefix (overridden automatically in CI). Leave `/`. |
| `cname` | Custom domain, e.g. `'mattryan.xyz'`. `null` = use github.io. |
| `home.document_title` | Home page `<title>`. |
| `home.heading`, `home.tagline`, `home.links_heading` | Home page text. |
| `home.links` | The orange link-tree buttons, top to bottom. |
| `icons` | Favicon files inside `assets/`. |

Links (`url`) can be:

- absolute: `https://mattryan.co` (opens in a new tab on the home page)
- site-relative: `about/` (base path is added for you)
- `mailto:contact@mattryan.xyz`

Example — add a button to the home page:

```php
'links' => [
    ['label' => 'mattryan.co', 'url' => 'https://mattryan.co'],
    ['label' => 'About',       'url' => 'about/'],     // new
    …
],
```

## Page files — `content/pages/*.php`

Each file does two things:

1. sets metadata on `$page`;
2. echoes the page body (plain HTML after `?>`).

```php
<?php
/** @var \MattRyan\Site\Site $site  @var \MattRyan\Site\Page $page */
$page->title = 'Uses';
$page->description = 'The tools I use.';
?>
<p>Editor: …</p>
<p><a href="<?= e($site->url()) ?>">Home</a></p>
```

All `$page` properties are listed in [ARCHITECTURE.md](ARCHITECTURE.md#page--srcpagephp).

### Add a page

1. Create `content/pages/<slug>.php` (the slug becomes the URL `/<slug>/`).
2. Set at least `$page->title`, write the body.
3. Optionally link it from `config/site.php` (`home.links`).
4. `php build.php` — it's also added to `sitemap.xml` automatically.

### Remove a page

Delete its file, remove any links to it in `config/site.php`, rebuild.

### Markup conventions

Write plain HTML. The `page` layout wraps it in `<main class="page">` (a
centred 560px column) after the `<h1>` title and adds the copyright footer
(`templates/partials/footer.php`) after your content. A page that uses the
`landing` layout writes its whole body, so it must include the footer itself:
`<?= $builder->renderTemplate('partials/footer') ?>`. The base styles in
`assets/css/style.css` only cover what the current pages use: paragraphs have
no margins and `h1`/`h2` use the heading font. Add rules there (for example
spacing between paragraphs, or list styles) when a new page needs them.

Always escape dynamic values with `e()` and build internal links with
`$site->url()` / images with `$site->asset()`.

### Images

Put files in `assets/images/` and reference them with
`<img src="<?= e($site->asset('images/name.webp')) ?>" alt="…">`.
