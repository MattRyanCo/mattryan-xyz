<?php
/**
 * Layout: "landing" — the page's content file supplies the whole <body>
 * content. Used by the home page link tree.
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
<?= $page->content ?>
</body>
</html>
