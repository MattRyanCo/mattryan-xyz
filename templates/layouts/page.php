<?php
/**
 * Layout: "page" — title + content in a centred column. Used by inner
 * pages (currently only the 404 page).
 *
 * @var \MattRyan\Site\Builder $builder
 * @var \MattRyan\Site\Site $site
 * @var \MattRyan\Site\Page $page
 */
?>
<!DOCTYPE html>
<html lang="<?= e($site->get('language')) ?>">
<head>
<?= $builder->renderTemplate('partials/head', ['page' => $page]) ?>
</head>
<body>
<main class="page">
<h1 class="page-title"><?= e($page->title) ?></h1>
<?= $page->content ?>
</main>
</body>
</html>
