<?php
/**
 * Layout: "landing" — the page's content file supplies the whole <body>
 * content. Used by the home page link tree. Because the content file owns
 * the body, it must include partials/footer itself (index.php puts it
 * inside the card).
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
