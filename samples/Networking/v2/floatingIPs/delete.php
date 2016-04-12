<?php

require 'vendor/autoload.php';

$rackspace = new Rackspace\Rackspace([
    'username' => '{username}',
    'apiKey'   => '{apiKey}',
]);

$rackspace->networkingV2ExtLayer3()
          ->getFloatingIp('{id}')
          ->delete();