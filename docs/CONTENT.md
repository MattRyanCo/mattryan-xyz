# Editing content

After any change: `php build.php`, then refresh `http://localhost:8000`
(see [BUILD.md](BUILD.md)). Commit and push to `main` to publish.

## Site settings — `config/site.php`

| Key | What it controls |
|-----|------------------|
| `name` | Site name in titles and the header. |
| `language` | `<html lang>`. |
| `site_url` | Absolute URL for canonical links and sitemap (overridden automatically in CI). |
| `base_path` | URL prefix (overridden automatically in CI). Leave `/`. |
| `cname` | Custom domain, e.g. `'mattryan.xyz'`. `null` = use github.io. |
| `contact_email` | Contact address. |
| `home.document_title` | Home page `<title>`. |
| `home.heading`, `home.tagline`, `home.links_heading` | Home page text. |
| `home.links` | The orange link-tree buttons, top to bottom. |
| `nav` | Header menu on inner pages. |
| `icons` | Favicon files inside `assets/`. |

Links (`url`) can be:

- absolute: `https://mattryan.co` (opens in a new tab on the home page)
- site-relative: `friends/` (base path is added for you)
- `mailto:contact@mattryan.xyz`

Example — add a button to the home page:

```php
'links' => [
    ['label' => 'mattryan.co', 'url' => 'https://mattryan.co'],
    ['label' => 'Friends',     'url' => 'friends/'],   // new
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
<div class="content-column">
<p class="wp-block-paragraph">Editor: …</p>
<p class="wp-block-paragraph"><a href="<?= e($site->url('friends/')) ?>">Friends</a></p>
</div>
```

All `$page` properties are listed in [ARCHITECTURE.md](ARCHITECTURE.md#page--srcpagephp).

### Add a page

1. Create `content/pages/<slug>.php` (the slug becomes the URL `/<slug>/`).
2. Set at least `$page->title`, write the body.
3. Optionally link it from `config/site.php` (`nav` or `home.links`).
4. `php build.php` — it's also added to `sitemap.xml` automatically.

### Remove a page

Delete its file, remove any links to it in `config/site.php`, rebuild.

### Markup conventions

The pages reuse WordPress block classes so the existing CSS applies:

| Element | Class(es) |
|---------|-----------|
| Paragraph | `wp-block-paragraph` |
| Content wrapper inside a page | `content-column` (plain div, no styles of its own) |
| Button | `<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">` |
| Heading | `wp-block-heading` |

Always escape dynamic values with `e()` and build internal links with
`$site->url()` / images with `$site->asset()`.

### Images

Put files in `assets/images/` and reference them with
`<img src="<?= e($site->asset('images/name.webp')) ?>" alt="…">`.

## Privacy Policy / Terms of Service

These pages embed policies hosted by Termageddon. The policy text is edited in
your Termageddon account, not here. Each page file only holds the policy ID.
If the embed script can't run, visitors get a "click here to view the policy"
link. See [MIGRATION.md](MIGRATION.md#termageddon) about domain restrictions.
