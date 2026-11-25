<?php
/**
 * Home page — the link tree.
 *
 * Text and links live in config/site.php under 'home', so most edits
 * don't need this file. Styles: the .hero rules in assets/css/style.css.
 *
 * @var \MattRyan\Site\Site $site
 * @var \MattRyan\Site\Page $page
 */
$page->documentTitle = $site->get('home.document_title');
$page->layout = 'landing';
$page->description = $site->get('home.short_description');
?>
<main class="hero">
<div class="hero-grid" aria-hidden="true"></div>
<div class="hero-frame">
<header class="hero-header">
<div class="hero-logo" aria-hidden="true"></div>
<h1 class="hero-title"><?= e($site->get('home.heading')) ?></h1>
<p class="hero-tagline"><?= e($site->get('home.tagline')) ?></p>
<p class="hero-description"><?= e($site->get('home.short_description')) ?></p>
</header>

<hr class="hero-divider">

<h2 class="hero-links-heading"><?= e($site->get('home.links_heading')) ?></h2>
<ul class="hero-links">
<?php foreach ($site->get('home.links', []) as $link): ?>
<li><a class="hero-button" href="<?= e($site->url($link['url'])) ?>"<?= link_attrs($link['url']) ?>><?= e($link['label']) ?></a></li>
<?php endforeach ?>
</ul>

<p class="hero-footer">Thanks for visiting.</p>
</div>
</main>
