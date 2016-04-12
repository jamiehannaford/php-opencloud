<?php declare(strict_types=1);

namespace Rackspace\Networking\v2;

class Params extends \OpenStack\Networking\v2\Params
{
    /**
     * Returns information about parameter
     *
     * @return array
     */
    public function idUrl(): array
    {
        return [
            'type'     => self::STRING_TYPE,
            'location' => self::URL,
            'required' => true,
        ];
    }

    public function floatingNetworkIdJson(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'floating_network_id',
            'description' => 'The UUID of the network associated with the floating IP.',
        ];
    }

    public function fixedIpAddressJson(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'fixed_ip_address',
            'description' => 'The fixed IP address that is associated with the floating IP. To associate the floating IP with a fixed IP at creation time, you must specify the identifier of the internal port. If an internal port has multiple associated IP addresses, the service chooses the first IP address unless you explicitly define a fixed IP address in the fixed_ip_address parameter.',
        ];
    }

    public function floatingIpAddressJson(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'floating_ip_address',
            'description' => 'The floating IP address.',
        ];
    }

    public function portIdJson(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'port_id',
            'description' => 'The UUID of the port.',
        ];
    }
}