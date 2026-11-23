<?php
/**
 * Friends & Feeds.
 *
 * On WordPress this page hosted the Friends plugin's "follow me" form.
 * A static site can't accept friend requests, so the form is replaced by
 * a link to the plugin; see docs/MIGRATION.md.
 *
 * @var \MattRyan\Site\Site $site
 * @var \MattRyan\Site\Page $page
 */
$page->title = 'Friends & Feeds';
$page->description = 'How I connect with friends and external feeds using WordPress and the Friends plugin.';
?>
<div class="content-column">
<div class="is-default-size aligncenter wp-block-site-logo"><a href="<?= e($site->url()) ?>" class="custom-logo-link" rel="home"><img decoding="async" width="600" height="240" src="<?= e($site->asset('images/logo.webp')) ?>" class="custom-logo" alt="<?= e($site->name) ?>"></a></div>
</div>

<div class="content-column">
<p class="only-friends wp-block-paragraph">Hi Friend!</p>

<p class="not-friends wp-block-paragraph">I have connected with my friends and external feeds using <strong>WordPress</strong> and the <strong>Friends plugin</strong>.</p>

<p class="not-friends wp-block-paragraph"><em>This is a work in progress system at this point.</em></p>

<p class="not-friends wp-block-paragraph">This means I can share private posts with just my friends while keeping my data under control. If you also have a WordPress site with the friends plugin, you can send me a friend request. If not, get your own <a href="https://wordpress.org/">WordPress</a> now, install the <a href="https://wordpress.org/plugins/friends/">Friends plugin</a>, and follow me!</p>

<p class="not-friends wp-block-paragraph"><a href="https://wpfriends.at/follow-me">Learn more about following</a></p>
</div>
