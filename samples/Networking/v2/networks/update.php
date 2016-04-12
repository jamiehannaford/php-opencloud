<?php

require 'vendor/autoload.php';

$rackspace = new Rackspace\Rackspace([
    'username' => '{username}',
    'apiKey'   => '{apiKey}',
]);

$network = $rackspace->networkingV2(['region' => '{region}'])
                    ->getNetwork('{networkId}');

$network->name = '{newName}';
$network->update();