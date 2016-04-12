<?php

require 'vendor/autoload.php';

$rackspace = new Rackspace\Rackspace([
    'username' => '{username}',
    'apiKey'   => '{apiKey}',
]);

$service = $rackspace->networkingV2(['region' => '{region}']);

foreach ($service->listNetworks() as $network) {
    /** @var $network \Rackspace\Networking\v2\Models\Network */
}