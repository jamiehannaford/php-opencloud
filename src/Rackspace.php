<?php declare(strict_types=1); declare(strict_types=1);

namespace Rackspace;

use GuzzleHttp\Client;
use OpenCloud\Common\Service\Builder;
use OpenCloud\Common\Transport\HandlerStack;
use OpenCloud\Common\Transport\Utils;
use Rackspace\Identity\v2\Service;

class Rackspace
{
    const US_AUTH = 'https://identity.api.rackspacecloud.com/v2.0';
    const UK_AUTH = 'https://lon.identity.api.rackspacecloud.com/v2.0';

    /** @var Builder */
    private $builder;

    /**
     * @param array $options User-defined options
     *
     * $options['username'] = (string) Your Rackspace username        [REQUIRED]
     *         ['apiKey']   = (string) Your Rackspace API key         [REQUIRED]
     *         ['debug']    = (bool)   Whether to enable HTTP logging [OPTIONAL]
     */
    public function __construct(array $options = [], Builder $builder = null)
    {
        if (!isset($options['authUrl'])) {
            $options['authUrl'] = self::US_AUTH;
        }

        $options['identityService'] = Service::factory(new Client([
            'base_uri' => Utils::normalizeUrl($options['authUrl']),
            'handler'  => HandlerStack::create(),
        ]));

        $this->builder = $builder ?: new Builder($options, __NAMESPACE__);
    }

    public function objectStoreV1(array $options = []): \Rackspace\ObjectStore\v1\Service
    {
        $defaults = ['catalogName' => 'cloudFiles', 'catalogType' => 'object-store'];
        return $this->builder->createService('ObjectStore\\v1', array_merge($defaults, $options));
    }

    public function objectStoreCdnV1(array $options = []): \Rackspace\ObjectStoreCDN\v1\Service
    {
        $defaults = ['catalogName' => 'cloudFilesCDN', 'catalogType' => 'rax:object-cdn'];
        return $this->builder->createService('ObjectStoreCDN\\v1', array_merge($defaults, $options));
    }

    public function networkingV2(array $options = []): \Rackspace\Networking\v2\Service
    {
        $defaults = ['catalogName' => 'cloudNetworks', 'catalogType' => 'network'];
        return $this->builder->createService('Networking\\v2', array_merge($defaults, $options));
    }

    /**
     * Creates a new Networking v2 Layer 3 service.
     *
     * @param array $options Options that will be used in configuring the service.
     *
     * @return \Rackspace\Networking\v2\Extensions\Layer3\Service
     */
    public function networkingV2ExtLayer3(array $options = []): \Rackspace\Networking\v2\Extensions\Layer3\Service
    {
        $defaults = ['catalogName' => 'cloudNetworks', 'catalogType' => 'network'];
        return $this->builder->createService('Networking\\v2\\Extensions\\Layer3', array_merge($defaults, $options));
    }

    /**
     * @param array $options
     *
     * @return \Rackspace\Compute\v2\Service
     */
    public function computeV2(array $options = []): \Rackspace\Compute\v2\Service
    {
        $defaults = ['catalogName' => 'cloudServersOpenStack', 'catalogType' => 'compute'];
        return $this->builder->createService('Compute\\v2', array_merge($defaults, $options));
    }
}