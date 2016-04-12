<?php

require 'vendor/autoload.php';

$rackspace = new Rackspace\Rackspace([
    'username' => '{username}',
    'apiKey'   => '{apiKey}',
]);

$service = $rackspace->networkingV2(['region' => '{region}']);

/** @var \Rackspace\Networking\v2\Models\Network $network */
$network = $service->createNetwork([
    'name'         => '{networkName}',
    'adminStateUp' => true,
]);