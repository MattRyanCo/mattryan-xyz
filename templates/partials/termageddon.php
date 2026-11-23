<?php
/**
 * Termageddon policy embed. The policy text is hosted by Termageddon and
 * injected client-side by their script (added to $page->scripts by the
 * content file). If the script fails, the fallback link still works.
 *
 * @var string $policyId Termageddon policy ID
 */
?>
<div class="content-column">
<div id="<?= e($policyId) ?>" class="policy_embed_div" aria-live="polite" aria-busy="true">
Please wait while the policy is loaded. If it does not load, please <a rel="nofollow" aria-label="click here to view the policy" href="https://policies.termageddon.com/api/policy/<?= e($policyId) ?>" target="_blank">click here to view the policy</a>.
</div>
</div>
