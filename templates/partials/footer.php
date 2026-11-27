<?php
/**
 * Copyright line at the bottom of every page. The year is the build year,
 * so rebuild in January to roll it over.
 *
 * Included by layouts/page.php automatically. Pages using the "landing"
 * layout supply their whole body, so they include it themselves
 * (see content/pages/index.php).
 *
 * @var \MattRyan\Site\Site $site
 */
?>
<footer class="footer">
<p>Copyright © <?= date('Y') ?> · <?= e($site->get('name')) ?> · All Rights Reserved.</p>
</footer>
