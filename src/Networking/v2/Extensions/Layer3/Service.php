<?php

namespace Rackspace\Networking\v2\Extensions\Layer3;

use OpenStack\Networking\v2\Extensions\Layer3\Service as OsService;
use Rackspace\Networking\v2\Extensions\Layer3\Models\FloatingIp;
use Rackspace\Networking\v2\Extensions\Layer3\Models\Router;

class Service extends OsService
{
    /**
     * @param array $info
     *
     * @return FloatingIp
     */
    protected function floatingIp(array $info = [])
    {
        return $this->model(FloatingIp::class, $info);
    }

    /**
     * @param array $info
     *
     * @return Router
     */
    protected function router(array $info = [])
    {
        return $this->model(Router::class, $info);
    }
}