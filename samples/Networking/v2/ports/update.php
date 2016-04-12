<?php

require 'vendor/autoload.php';

$rackspace = new Rackspace\Rackspace([
    'username' => '{username}',
    'apiKey'   => '{apiKey}',
]);

$service = $rackspace->networkingV2(['region' => '{region}']);

$port = $service->getPort('{portId}');

$port->name = '{newName}';
$port->update();