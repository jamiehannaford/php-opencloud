<?php

require 'vendor/autoload.php';

$rackspace = new Rackspace\Rackspace([
    'username' => '{username}',
    'apiKey'   => '{apiKey}',
]);

$rackspace->networkingV2(['region' => '{region}'])
    ->getSubnet('{subnetId}')
    ->delete();