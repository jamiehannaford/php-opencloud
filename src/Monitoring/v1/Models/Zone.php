<?php declare(strict_types=1);

namespace Rackspace\Monitoring\v1\Models;

use OpenCloud\Common\Resource\OperatorResource;
use OpenCloud\Common\Resource\Listable;
use OpenCloud\Common\Resource\Retrievable;

/**
 * Represents a Zone resource in the Monitoring v1 service
 *
 * @property \Rackspace\Monitoring\v1\Api $api
 */
class Zone extends OperatorResource implements Listable, Retrievable
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $countryCode;

    /**
     * @var array
     */
    public $sourceIps;

    protected $aliases = [
        'country_code' => 'countryCode',
        'source_ips'   => 'sourceIps',
    ];

    /**
     * {@inheritDoc}
     */
    public function retrieve()
    {
        $response = $this->executeWithState($this->api->getZone());
        $this->populateFromResponse($response);
    }
}
