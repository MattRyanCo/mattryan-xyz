<?php
/**
 * Site header with title and responsive navigation (inner pages).
 * Markup mirrors the WordPress navigation block so the extracted CSS in
 * assets/css/wp/blocks.css applies; assets/js/navigation.js drives the
 * mobile menu.
 *
 * @var \MattRyan\Site\Site $site
 */
$navStyle = 'text-transform:uppercase;letter-spacing:0.04em';
?>
<header class="alignfull wp-block-template-part">
<header class="wp-block-mattryanxyz-header alignfull site-header-block is-mode-static-solid has-button-treatment-preserve">
<div class="wp-block-group alignfull has-base-color has-contrast-background-color has-text-color has-background has-global-padding is-layout-constrained wp-container-core-group-is-layout-4dbf6386 wp-block-group-is-layout-constrained" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40)">
<h1 style="text-transform:uppercase;letter-spacing:0.08em" class="wp-block-site-title has-text-color has-chakra-petch-font-family"><a href="<?= e($site->url()) ?>" rel="home"><?= e($site->name) ?></a></h1>
<nav class="is-responsive wp-block-navigation is-layout-flex wp-container-core-navigation-is-layout-da0693cc wp-block-navigation-is-layout-flex" aria-label="Main" data-nav>
<button type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="nav-modal" aria-label="Open menu" class="wp-block-navigation__responsive-container-open" data-nav-open><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M4 7.5h16v1.5H4z"></path><path d="M4 15h16v1.5H4z"></path></svg></button>
<div class="wp-block-navigation__responsive-container has-text-color has-contrast-color has-background has-base-background-color" id="nav-modal" tabindex="-1" data-nav-container>
<div class="wp-block-navigation__responsive-close" tabindex="-1">
<div class="wp-block-navigation__responsive-dialog" data-nav-dialog>
<button type="button" aria-label="Close menu" class="wp-block-navigation__responsive-container-close" data-nav-close><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true" focusable="false"><path d="m13.06 12 6.47-6.47-1.06-1.06L12 10.94 5.53 4.47 4.47 5.53 10.94 12l-6.47 6.47 1.06 1.06L12 13.06l6.47 6.47 1.06-1.06L13.06 12Z"></path></svg></button>
<div class="wp-block-navigation__responsive-container-content">
<ul class="wp-block-navigation__container is-responsive wp-block-navigation">
<?php foreach ($site->get('nav', []) as $item): ?>
<li style="<?= $navStyle ?>" class="wp-block-navigation-item wp-block-navigation-link has-small-font-size has-jetbrains-mono-font-family"><a class="wp-block-navigation-item__content" href="<?= e($site->url($item['url'])) ?>"><span class="wp-block-navigation-item__label"><?= e($item['label']) ?></span></a></li>
<?php endforeach ?>
</ul>
</div>
</div>
</div>
</div>
</nav>
</div>
</header>
</header>
