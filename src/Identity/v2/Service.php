<?php declare(strict_types=1);

namespace Rackspace\Identity\v2;

use GuzzleHttp\ClientInterface;
use OpenCloud\Common\Auth\IdentityService;

class Service extends \OpenStack\Identity\v2\Service
{
    public static function factory(ClientInterface $client): IdentityService
    {
        return new static($client, new Api());
    }
}