<?php declare(strict_types=1);

namespace Rackspace\LoadBalancer\v1;

use OpenCloud\Common\Resource\OperatorResource;
use Rackspace\LoadBalancer\v1\Models\LoadBalancer;

/**
 * @property \Rackspace\LoadBalancer\v1\Api $api
 */
class Service extends OperatorResource
{
    private function loadBalancer(array $data = []): LoadBalancer
    {
        return $this->model(LoadBalancer::class, $data);
    }

    public function listLoadBalancers(): \Generator
    {
        return $this->loadBalancer()->enumerate($this->api->getLoadbalancers());
    }

    public function createLoadBalancer(array $options): LoadBalancer
    {
        return $this->loadBalancer()->create($options);
    }

    public function deleteLoadBalancers(array $ids)
    {
        return $this->execute($this->api->deleteLoadbalancers(), ['id' => $ids]);
    }

    public function getLoadBalancer($id = null): LoadBalancer
    {
        $options = $id ? ['id' => $id] : [];
        return $this->loadBalancer($options);
    }
}