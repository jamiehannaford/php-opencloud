<?php

require 'vendor/autoload.php';

$rackspace = new Rackspace\Rackspace([
    'username' => '{username}',
    'apiKey'   => '{apiKey}',
]);

$floatingIps = $rackspace->networkingV2ExtLayer3()->listFloatingIps();

foreach ($floatingIps as $floatingIp) {
    /** @var \Rackspace\Networking\v2\Extensions\Layer3\Models\FloatingIp $floatingIp */
}