<?php declare(strict_types = 1);

namespace Rackspace\Networking\v2;

class Api extends \OpenStack\Networking\v2\Api
{
    protected $params;
    protected $pathPrefix = '';

    public function __construct()
    {
        parent::__construct();

        $this->params = new Params;
    }

    public function postFloatingIps()
    {
        return [
            'method'  => 'POST',
            'path'    => 'floatingips',
            'jsonKey' => 'floatingip',
            'params'  => [
                'floatingNetworkId' => $this->params->floatingNetworkIdJson(),
                'fixedIpAddress'    => $this->params->fixedIpAddressJson(),
                'floatingIpAddress' => $this->params->floatingIpAddressJson(),
                'portId'            => $this->params->portIdJson(),
            ],
        ];
    }

    public function getFloatingIps()
    {
        return [
            'method' => 'GET',
            'path'   => 'floatingips',
            'params' => [],
        ];
    }

    public function getFloatingIp()
    {
        return [
            'method' => 'GET',
            'path'   => 'floatingips/{id}',
            'params' => [
                'id' => $this->params->idUrl(),
            ],
        ];
    }

    public function putFloatingIp()
    {
        return [
            'method'  => 'PUT',
            'path'    => 'floatingips/{id}',
            'jsonKey' => 'floatingip',
            'params'  => [
                'id'     => $this->params->idUrl(),
                'portId' => $this->params->portIdJson(),
            ],
        ];
    }

    public function deleteFloatingIp()
    {
        return [
            'method' => 'DELETE',
            'path'   => 'floatingips/{id}',
            'params' => [
                'id' => $this->params->idUrl(),
            ],
        ];
    }
}