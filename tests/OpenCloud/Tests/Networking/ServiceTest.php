<?php
/**
 * Copyright 2012-2014 Rackspace US, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace OpenCloud\Tests\Networking;

use OpenCloud\Networking\Service;
use OpenCloud\Common\Exceptions\InvalidTemplateError;

class ServiceTest extends NetworkingTestCase
{
    public function test__construct()
    {
        $service = $this->getClient()->networkingService(null, 'IAD');
        $this->assertIsService($service);
    }

    public function testCreateNetwork()
    {
        $this->assertIsNetwork($this->service->createNetwork());
    }

    public function testListNetworks()
    {
        $this->addMockSubscriber($this->makeResponse('{"networks":[{"admin_state_up":true,"id":"00000000-0000-0000-0000-000000000000","name":"public","shared":true,"status":"ACTIVE","subnets":[],"tenant_id":"rackspace"},{"admin_state_up":true,"id":"11111111-1111-1111-1111-111111111111","name":"private","shared":true,"status":"ACTIVE","subnets":[],"tenant_id":"rackspace"},{"admin_state_up":true,"id":"2993e407-5531-4ca8-9d2a-0d13b5cac904","name":"RackNet","shared":false,"status":"ACTIVE","subnets":["017d8997-70ec-4448-91d9-a8097d6d60f3"],"tenant_id":"123456"}]}'));

        $networks = $this->service->listNetworks();
        $this->isCollection($networks);
        $this->assertIsNetwork($networks->getElement(0));
    }

    public function testGetNetwork()
    {
        $this->addMockSubscriber($this->makeResponse('{"network":{"admin_state_up":true,"id":"4d4e772a-98e7-4409-8a3c-4fed4324da26","name":"sameer-3","shared":false,"status":"ACTIVE","subnets":[],"tenant_id":"546428"}}'));

        $network = $this->service->getNetwork('4d4e772a-98e7-4409-8a3c-4fed4324da26');
        $this->assertIsNetwork($network);
        $this->assertEquals('sameer-3', $network->getName());
    }

    public function testCreateSubnet()
    {
        $this->assertIsSubnet($this->service->createSubnet());
    }

    public function testListSubnets()
    {
        $this->addMockSubscriber($this->makeResponse('{"subnets":[{"allocation_pools":[{"end":"192.168.9.254","start":"192.168.9.1"}],"cidr":"192.168.9.0/24","dns_nameservers":[],"enable_dhcp":false,"gateway_ip":null,"host_routes":[],"id":"f975defc-637d-4e2a-858b-c6cc4cec3951","ip_version":4,"name":"","network_id":"0ebf6a10-5fc1-4f13-aca9-be0a2a00b1ac","tenant_id":"123456"}]}'));

        $subnets = $this->service->listSubnets();
        $this->isCollection($subnets);
        $this->assertIsSubnet($subnets->getElement(0));
    }

    public function testGetSubnet()
    {
        $this->addMockSubscriber($this->makeResponse('{"subnet":{"name":"my_subnet","enable_dhcp":false,"network_id":"d32019d3-bc6e-4319-9c1d-6722fc136a22","tenant_id":"4fd44f30292945e481c7b8a0c8908869","dns_nameservers":[],"allocation_pools":[{"start":"192.0.0.2","end":"192.255.255.254"}],"host_routes":[],"ip_version":4,"gateway_ip":"192.0.0.1","cidr":"192.0.0.0/8","id":"54d6f61d-db07-451c-9ab3-b9609b6b6f0b"}}'));

        $subnet = $this->service->getSubnet('54d6f61d-db07-451c-9ab3-b9609b6b6f0b');
        $this->assertIsSubnet($subnet);
        $this->assertEquals('my_subnet', $subnet->getName());
    }

    public function testCreatePort()
    {
        $this->assertIsPort($this->service->createPort());
    }

    public function testListPorts()
    {
        $this->addMockSubscriber($this->makeResponse('{"ports":[{"admin_state_up":true,"device_id":"","device_owner":null,"fixed_ips":[{"ip_address":"192.168.3.11","subnet_id":"739ecc58-f9a0-4145-8a06-cd415e6e5c8d"}],"id":"10ba23f5-bb70-4fd7-a118-83f89b62e340","mac_address":"BE:CB:FE:00:00:EE","name":"port1","network_id":"6406ed30-193a-4958-aae5-7c05268d332b","security_groups":[],"status":"ACTIVE","tenant_id":"123456"}]}'));

        $ports = $this->service->listPorts();
        $this->isCollection($ports);
        $this->assertIsPort($ports->getElement(0));
    }

    public function testGetPort()
    {
        $this->addMockSubscriber($this->makeResponse('{"port":{"admin_state_up":true,"device_id":"","device_owner":null,"fixed_ips":[{"ip_address":"192.168.3.11","subnet_id":"739ecc58-f9a0-4145-8a06-cd415e6e5c8d"}],"id":"10ba23f5-bb70-4fd7-a118-83f89b62e340","mac_address":"BE:CB:FE:00:00:EE","name":"port1","network_id":"6406ed30-193a-4958-aae5-7c05268d332b","security_groups":[],"status":"ACTIVE","tenant_id":"123456"}}'));

        $port = $this->service->getPort('10ba23f5-bb70-4fd7-a118-83f89b62e340');
        $this->assertIsPort($port);
        $this->assertEquals('port1', $port->getName());
    }
}
