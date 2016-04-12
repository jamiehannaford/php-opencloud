<?php

require 'vendor/autoload.php';

$rackspace = new Rackspace\Rackspace([
    'username' => '{username}',
    'apiKey'   => '{apiKey}',
]);

$service = $rackspace->networkingV2(['region' => '{region}']);

foreach ($service->listSubnets() as $subnet) {
    /** @var $subnet Rackspace\Networking\v2\Models\Subnet */
}