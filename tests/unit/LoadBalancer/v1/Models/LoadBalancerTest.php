<?php declare(strict_types = 1);

namespace Rackspace\Test\LoadBalancer\v1\Models;

use GuzzleHttp\Psr7\Response;
use OpenCloud\Test\TestCase;
use Rackspace\LoadBalancer\v1\Api;
use Rackspace\LoadBalancer\v1\Models\LoadBalancer;

class LoadBalancerTest extends TestCase
{
    /** @var LoadBalancer */
    private $loadBalancer;

    public function setUp()
    {
        parent::setUp();

        $this->rootFixturesDir = dirname(__DIR__);

        $this->loadBalancer = new LoadBalancer($this->client->reveal(), new Api());
        $this->loadBalancer->id = 'id';
    }

    public function test_it_updates()
    {
        $expectedJson = ['loadBalancer' => [
            'name'          => "sample-loadbalancer",
            "algorithm"     => "RANDOM",
            "protocol"      => "HTTP",
            "port"          => 80,
            "timeout"       => 60,
            "httpsRedirect" => true,
        ]];

        $this->setupMock('PUT', 'loadbalancers/id', $expectedJson, [], new Response(201));

        $this->loadBalancer->name = "sample-loadbalancer";
        $this->loadBalancer->algorithm = "RANDOM";
        $this->loadBalancer->protocol = "HTTP";
        $this->loadBalancer->port = 80;
        $this->loadBalancer->timeout = 60;
        $this->loadBalancer->httpsRedirect = true;

        $this->loadBalancer->update();
    }

    public function test_it_deletes()
    {
        $this->setupMock('DELETE', 'loadbalancers/id', null, [], new Response(202));

        $this->loadBalancer->delete();
    }

    public function test_it_retrieves()
    {
        $this->setupMock('GET', 'loadbalancers/id', null, [], 'LoadBalancer');

        $this->loadBalancer->retrieve();
    }
}