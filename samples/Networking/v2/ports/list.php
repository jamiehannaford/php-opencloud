<?php

require 'vendor/autoload.php';

$rackspace = new Rackspace\Rackspace([
    'username' => '{username}',
    'apiKey'   => '{apiKey}',
]);

$service = $rackspace->networkingV2(['region' => '{region}']);

foreach ($service->listPorts() as $port) {
    /** @var $port Rackspace\Networking\v2\Models\Port */
}