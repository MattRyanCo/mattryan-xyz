<?php
/**
 * Home page — the link tree.
 *
 * Text and links live in config/site.php under 'home', so most edits
 * don't need this file. The markup below mirrors the original
 * WordPress blocks so assets/css/landing.css applies unchanged.
 *
 * @var \MattRyan\Site\Site $site
 * @var \MattRyan\Site\Page $page
 */
$page->title = 'Home';
$page->documentTitle = $site->get('home.document_title');
$page->layout = 'landing';
$page->description = $site->get('home.tagline');
$page->description = $site->get('home.short_description');

$bg = $site->asset('images/geometric-bg.jpg');
?>
<section class="wp-block-group alignfull hero has-custom-css has-contrast-color has-base-background-color has-text-color has-background is-vertical is-content-justification-center is-layout-flow wp-container-core-group-is-layout-5fec0ffd wp-block-group-is-layout-flow wp-custom-css-e3d25b7b" style="min-height:100vh;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30);background-image:url('<?= e($bg) ?>');background-position:center center;background-size:cover;">
<div class="wp-block-group hero-grid-overlay is-layout-flow wp-container-core-group-is-layout-c982a6be wp-block-group-is-layout-flow"></div>

<div class="wp-block-group hero-frame animate-on-scroll is-vertical is-layout-flex wp-container-core-group-is-layout-b260b241 wp-block-group-is-layout-flex">
<div class="wp-block-group hero-header-zone is-vertical is-layout-flex wp-container-core-group-is-layout-b260b241 wp-block-group-is-layout-flex">
<div class="wp-block-group hero-logo-box is-content-justification-center is-nowrap is-layout-flex wp-container-core-group-is-layout-690c4046 wp-block-group-is-layout-flex">
<div class="wp-block-group hero-logo-symbol editor-visible-icon is-layout-flow wp-container-core-group-is-layout-c982a6be wp-block-group-is-layout-flow"></div>
</div>

<div class="wp-block-group hero-title-box is-layout-flow wp-container-core-group-is-layout-33d71ff5 wp-block-group-is-layout-flow">
<h1 class="wp-block-heading hero-title has-chakra-petch-font-family has-contrast-color has-text-color has-display-font-size" style="letter-spacing:0.08em;text-transform:uppercase"><span class="hero-title-line"><?= e($site->get('home.heading')) ?></span></h1>
</div>

<p class="has-text-align-center hero-subhead has-jetbrains-mono-font-family has-contrast-2-color has-text-color has-small-font-size wp-block-paragraph" style="margin-bottom:var(--wp--preset--spacing--40);letter-spacing:0.05em;line-height:1.6"><?= e($site->get('home.tagline')) ?></p>
<p class="has-text-align-center hero-description has-jetbrains-mono-font-family has-contrast-2-color has-text-color has-small-font-size wp-block-paragraph" style="margin-bottom:var(--wp--preset--spacing--40);letter-spacing:0.05em;line-height:1.6"><?= e($site->get('home.short_description')) ?></p>
</div>

<hr class="wp-block-separator has-alpha-channel-opacity hero-divider has-custom-css wp-custom-css-a8ffb529">

<h2 class="wp-block-heading has-text-align-center hero-links-heading has-chakra-petch-font-family has-accent-5-color has-text-color has-xl-font-size" style="margin-bottom:var(--wp--preset--spacing--40);font-weight:600;letter-spacing:0.12em;text-transform:uppercase"><?= e($site->get('home.links_heading')) ?></h2>

<div class="wp-block-buttons hero-links-stack is-vertical is-layout-flex wp-container-core-buttons-is-layout-006f131a wp-block-buttons-is-layout-flex">
<?php foreach ($site->get('home.links', []) as $link): ?>
<div class="wp-block-button hero-button"><a class="wp-block-button__link wp-element-button" href="<?= e($site->url($link['url'])) ?>"<?= link_attrs($link['url']) ?>><span class="hero-button-text"><?= e($link['label']) ?></span></a></div>
<?php endforeach ?>
</div>

<p class="has-text-align-center hero-footer-meta has-jetbrains-mono-font-family has-contrast-2-color has-text-color has-small-font-size wp-block-paragraph" style="letter-spacing:0.12em;text-transform:uppercase">Thanks for visiting.</p>
</div>
</section>
