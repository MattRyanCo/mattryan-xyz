<?php
/**
 * Layout: "page" — header + title + content. Used by inner pages
 * (Friends, Privacy Policy, Terms of Service, 404).
 *
 * @var \MattRyan\Site\Builder $builder
 * @var \MattRyan\Site\Site $site
 * @var \MattRyan\Site\Page $page
 */
$styles = ['css/fonts.css', 'css/wp/blocks.css', 'css/header.css', 'css/wp/global-page.css', 'css/wp/library.css', 'css/theme.css'];
$localScripts = ['js/navigation.js', 'js/theme.js'];
?>
<!DOCTYPE html>
<html lang="<?= e($site->get('language')) ?>">
<head>
<?= $builder->renderTemplate('partials/head', ['page' => $page, 'styles' => $styles]) ?>
</head>
<body class="wp-singular page wp-custom-logo wp-embed-responsive has-solid-header-start <?= e($page->bodyClass) ?>">
<a class="skip-link screen-reader-text" href="#main">Skip to content</a>
<div class="wp-site-blocks">
<?= $builder->renderTemplate('partials/header') ?>

<main id="main" class="wp-block-group has-global-padding is-layout-constrained wp-block-group-is-layout-constrained" style="margin-top:var(--wp--preset--spacing--50)">
<div class="wp-block-group alignfull has-global-padding is-layout-constrained wp-block-group-is-layout-constrained" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
<div class="wp-block-group alignwide has-global-padding is-layout-constrained wp-container-core-group-is-layout-8d98a98a wp-block-group-is-layout-constrained" style="padding-bottom:var(--wp--preset--spacing--50)"><h1 class="wp-block-post-title"><?= e($page->title) ?></h1></div>

<div class="entry-content alignfull wp-block-post-content has-global-padding is-layout-constrained wp-block-post-content-is-layout-constrained">
<?= $page->content ?>
</div>
</div>
</main>
</div>
<?= $builder->renderTemplate('partials/scripts', ['page' => $page, 'localScripts' => $localScripts]) ?>
</body>
</html>
