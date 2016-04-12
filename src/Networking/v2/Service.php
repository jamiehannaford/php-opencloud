<?php declare(strict_types=1);

namespace Rackspace\Networking\v2;

use OpenCloud\Common\Resource\OperatorResource;
use OpenCloud\Common\Service\AbstractService;
use Rackspace\Networking\v2\Models\FloatingIp;
use Rackspace\Networking\v2\Models\Network;
use Rackspace\Networking\v2\Models\Port;
use Rackspace\Networking\v2\Models\SecurityGroup;
use Rackspace\Networking\v2\Models\Subnet;

/**
 * @property \Rackspace\Networking\v2\Api $api
 */
class Service extends AbstractService
{
    private function network(array $info = []): Network
    {
        return $this->model(Network::class, $info);
    }

    private function subnet(array $info = []): Subnet
    {
        return $this->model(Subnet::class, $info);
    }

    private function port(array $info = []): Port
    {
        return $this->model(Port::class, $info);
    }

    /**
     * @return \Generator
     */
    public function listNetworks(): \Generator
    {
        return $this->network()->enumerate($this->api->getNetworks());
    }

    /**
     * @param array $options
     *
     * @return Network
     */
    public function createNetwork(array $options): Network
    {
        return $this->network()->create($options);
    }

    /**
     * @param string $id
     *
     * @return Network
     */
    public function getNetwork(string $id): Network
    {
        return $this->network(['id' => $id]);
    }

    /**
     * @return \Generator
     */
    public function listSubnets(): \Generator
    {
        return $this->subnet()->enumerate($this->api->getSubnets());
    }

    /**
     * @param array $options
     *
     * @return Subnet
     */
    public function createSubnet(array $options): Subnet
    {
        return $this->subnet()->create($options);
    }

    /**
     * @param string $id
     *
     * @return Subnet
     */
    public function getSubnet(string $id): Subnet
    {
        return $this->subnet(['id' => $id]);
    }

    /**
     * @return \Generator
     */
    public function listPorts(): \Generator
    {
        return $this->port()->enumerate($this->api->getPorts());
    }

    /**
     * @param array $options
     *
     * @return Port
     */
    public function createPort(array $options): Port
    {
        return $this->port()->create($options);
    }

    /**
     * @param string $id
     *
     * @return Port
     */
    public function getPort(string $id): Port
    {
        return $this->port(['id' => $id]);
    }
}