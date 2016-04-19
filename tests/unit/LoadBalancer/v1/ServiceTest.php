<?php declare(strict_types = 1);

namespace Rackspace\Test\LoadBalancer\v1;

use GuzzleHttp\Psr7\Response;
use OpenCloud\Test\TestCase;
use Rackspace\LoadBalancer\v1\Api;
use Rackspace\LoadBalancer\v1\Models\LoadBalancer;
use Rackspace\LoadBalancer\v1\Models\VirtualIp;
use Rackspace\LoadBalancer\v1\Service;

class ServiceTest extends TestCase
{
    /** @var Service */
    private $service;

    public function setUp()
    {
        parent::setUp();

        $this->rootFixturesDir = __DIR__;

        $this->service = new Service($this->client->reveal(), new Api());
    }

    public function test_it_lists_lbs()
    {
        $this->setupMock('GET', 'loadbalancers', null, [], 'LoadBalancers');

        foreach ($this->service->listLoadBalancers() as $lb) {
            /** @var LoadBalancer $lb */
            $this->assertInstanceOf(LoadBalancer::class, $lb);
            $this->assertNotNull($lb->name);
            $this->assertNotNull($lb->id);
            $this->assertEquals('HTTP', $lb->protocol);
            $this->assertEquals(80, $lb->port);
            $this->assertEquals('RANDOM', $lb->algorithm);
            $this->assertEquals('ACTIVE', $lb->status);
            $this->assertGreaterThan(1, $lb->nodeCount);
            $this->assertInstanceOf(VirtualIp::class, $lb->virtualIps[0]);
            $this->assertInstanceOf(\DateTimeImmutable::class, $lb->created);
            $this->assertInstanceOf(\DateTimeImmutable::class, $lb->updated);
        }
    }

    public function test_it_creates_lb()
    {
        $options = [
            "name"       => "a-new-loadbalancer",
            "port"       => 80,
            "protocol"   => "HTTP",
            "virtualIps" => [
                ["type" => "PUBLIC"],
            ],
            "nodes"      => [
                ["address" => "1.2.3.4", "port" => 80, "condition" => "ENABLED"],
            ],
        ];

        $expectedJson = ['loadBalancer' => $options];

        $this->setupMock('POST', 'loadbalancers', $expectedJson, [], 'LoadBalancer');

        $lb = $this->service->createLoadBalancer($options);
        $this->assertInstanceOf(LoadBalancer::class, $lb);
    }

    public function test_it_bulk_deletes_lbs()
    {
        $this->client
            ->request('DELETE', 'loadbalancers', ["headers" => [], 'query' => ['id' => ['1', '2', '3']]])
            ->shouldBeCalled()
            ->willReturn(new Response(202));

        $this->service->deleteLoadBalancers(['1', '2', '3']);
    }

    public function test_it_retrieves_lb()
    {
        $this->assertInstanceOf(LoadBalancer::class, $this->service->getLoadBalancer());
    }
}