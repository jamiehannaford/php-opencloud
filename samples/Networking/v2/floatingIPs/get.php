<?php

require 'vendor/autoload.php';

$rackspace = new Rackspace\Rackspace([
    'username' => '{username}',
    'apiKey'   => '{apiKey}',
]);

/** @var \Rackspace\Networking\v2\Extensions\Layer3\Models\FloatingIp $floatingIp */
$floatingIp = $rackspace->networkingV2ExtLayer3()
                        ->getFloatingIp('{id}');