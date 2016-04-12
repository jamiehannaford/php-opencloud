<?php

require 'vendor/autoload.php';

$rackspace = new Rackspace\Rackspace([
    'username' => '{username}',
    'apiKey'   => '{apiKey}',
]);

$floatingIp = $rackspace->networkingV2ExtLayer3()->getFloatingIp('{id}');

$floatingIp->portId = '{newPortId}';
$floatingIp->update();