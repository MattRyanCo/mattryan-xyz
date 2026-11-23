<?php
/**
 * Scripts at the end of <body>.
 *
 * @var \MattRyan\Site\Site $site
 * @var \MattRyan\Site\Page $page
 * @var list<string> $localScripts asset paths inside assets/
 */
?>
<?php foreach ($localScripts as $script): ?>
<script src="<?= e($site->asset($script)) ?>" defer></script>
<?php endforeach ?>
<?php foreach ($page->scripts as $src): ?>
<script src="<?= e($src) ?>"></script>
<?php endforeach ?>
