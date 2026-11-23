<?php
/**
 * Terms of Service — embedded from Termageddon.
 *
 * @var \MattRyan\Site\Builder $builder
 * @var \MattRyan\Site\Page $page
 */
$policyId = 'UmpWbFpIaExZMEZKTDAxb2NHYzlQUT09';

$page->title = 'Terms of Service';
$page->scripts[] = "https://policies.termageddon.com/api/embed/{$policyId}.js";

echo $builder->renderTemplate('partials/termageddon', ['policyId' => $policyId]);
