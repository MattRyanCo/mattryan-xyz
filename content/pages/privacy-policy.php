<?php
/**
 * Privacy Policy — embedded from Termageddon.
 *
 * @var \MattRyan\Site\Builder $builder
 * @var \MattRyan\Site\Page $page
 */
$policyId = 'VTNKMVpWVkZPWEZKT1hWdE1GRTlQUT09';

$page->title = 'Privacy Policy';
$page->bodyClass = 'privacy-policy';
$page->scripts[] = "https://policies.termageddon.com/api/embed/{$policyId}.js";

echo $builder->renderTemplate('partials/termageddon', ['policyId' => $policyId]);
