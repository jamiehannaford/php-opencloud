<?php

require 'vendor/autoload.php';

$rackspace = new Rackspace\Rackspace([
    'username' => '{username}',
    'apiKey'   => '{apiKey}',
]);

$service = $rackspace->networkingV2(['region' => '{region}']);

/** @var \Rackspace\Networking\v2\Models\Port $port */
$port = $service->createPort([
    'name'         => 'portName',
    'networkId'    => '{networkId}',
    'adminStateUp' => true,
]);