<?php

require 'vendor/autoload.php';

$rackspace = new Rackspace\Rackspace([
    'username' => '{username}',
    'apiKey'   => '{apiKey}',
]);

$networking = $rackspace->networkingV2ExtLayer3();

/** @var \Rackspace\Networking\v2\Extensions\Layer3\Models\FloatingIp $ip */
$ip = $networking->createFloatingIp([
    "floatingNetworkId" => "{networkId}",
    "portId"            => "{portId}",
    'fixedIpAddress'    => '{fixedIpAddress}',
]);
