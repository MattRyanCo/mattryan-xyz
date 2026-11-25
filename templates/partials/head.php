<?php
/**
 * <head> contents shared by all layouts.
 *
 * @var \MattRyan\Site\Site $site
 * @var \MattRyan\Site\Page $page
 */
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($page->documentTitle) ?></title>
<?php if ($page->description !== ''): ?>
<meta name="description" content="<?= e($page->description) ?>">
<?php endif ?>
<?php if ($page->slug !== '404'): ?>
<link rel="canonical" href="<?= e($site->absoluteUrl($page->path)) ?>">
<?php endif ?>
<link rel="stylesheet" href="<?= e($site->asset('css/style.css')) ?>">
<link rel="icon" href="<?= e($site->asset($site->get('icons.small'))) ?>" sizes="32x32">
<link rel="icon" href="<?= e($site->asset($site->get('icons.large'))) ?>" sizes="192x192">
<link rel="apple-touch-icon" href="<?= e($site->asset($site->get('icons.large'))) ?>">
