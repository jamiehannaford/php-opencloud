<?php

require 'vendor/autoload.php';

$rackspace = new Rackspace\Rackspace([
    'username' => '{username}',
    'apiKey'   => '{apiKey}',
]);

$service = $rackspace->networkingV2(['region' => '{region}']);

/** @var \Rackspace\Networking\v2\Models\Subnet $subnet */
$subnet = $service->createSubnet([
    'name'      => '{subnetName}',
    'networkId' => '{networkId}',
    'ipVersion' => 4,
    'cidr'      => '192.168.199.0/24'
]);