<?php
/**
 * <head> contents shared by all layouts.
 *
 * @var \MattRyan\Site\Site $site
 * @var \MattRyan\Site\Page $page
 * @var list<string> $styles  asset paths (inside assets/) in cascade order
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
<?php foreach ($styles as $style): ?>
<link rel="stylesheet" href="<?= e($site->asset($style)) ?>">
<?php endforeach ?>
<link rel="icon" href="<?= e($site->asset($site->get('icons.small'))) ?>" sizes="32x32">
<link rel="icon" href="<?= e($site->asset($site->get('icons.large'))) ?>" sizes="192x192">
<link rel="apple-touch-icon" href="<?= e($site->asset($site->get('icons.large'))) ?>">
<script>document.documentElement.classList.add('js');</script>
