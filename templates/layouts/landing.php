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
?>
<!DOCTYPE html>
<html lang="<?= e($site->get('language')) ?>">
<head>
<?= $builder->renderTemplate('partials/head', ['page' => $page, 'styles' => $styles]) ?>
</head>
<body>
<main class="wp-site-blocks">
<?= $page->content ?>
</main>
</body>
</html>
