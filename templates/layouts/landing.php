<?php
/**
 * Layout: "landing" — full-screen hero with no header. Used by the home
 * page link tree. The page's content file supplies everything inside the
 * hero <section>.
 *
 * @var \MattRyan\Site\Builder $builder
 * @var \MattRyan\Site\Site $site
 * @var \MattRyan\Site\Page $page
 */
$styles = ['css/fonts.css', 'css/wp/blocks.css', 'css/wp/global-landing.css', 'css/landing.css', 'css/wp/library.css', 'css/theme.css'];
$localScripts = ['js/theme.js'];
?>
<!DOCTYPE html>
<html lang="<?= e($site->get('language')) ?>">
<head>
<?= $builder->renderTemplate('partials/head', ['page' => $page, 'styles' => $styles]) ?>
</head>
<body class="home page wp-custom-logo wp-embed-responsive has-solid-header-start <?= e($page->bodyClass) ?>">
<main class="wp-site-blocks">
<?= $page->content ?>
</main>
<?= $builder->renderTemplate('partials/scripts', ['page' => $page, 'localScripts' => $localScripts]) ?>
</body>
</html>
