<?php
/**
 * 404 page. GitHub Pages serves /404.html for any missing URL.
 * Links must be absolute-from-root ($site->url()) because this page is
 * shown at arbitrary depths.
 *
 * @var \MattRyan\Site\Site $site
 * @var \MattRyan\Site\Page $page
 */
$page->title = 'Page not found';
$page->inSitemap = false;
?>
<div class="content-column">
<p class="wp-block-paragraph">Sorry, that page doesn't exist (any more). This site moved from WordPress to a static build, so some old addresses are gone.</p>
<p class="wp-block-paragraph"><a href="<?= e($site->url()) ?>">← Back to the home page</a></p>
</div>
