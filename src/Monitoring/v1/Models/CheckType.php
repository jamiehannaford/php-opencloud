<?php declare(strict_types=1);

namespace Rackspace\Monitoring\v1\Models;

use OpenCloud\Common\Resource\OperatorResource;
use OpenCloud\Common\Resource\Listable;
use OpenCloud\Common\Resource\Retrievable;

/**
 * Represents a CheckType resource in the Monitoring v1 service
 *
 * @property \Rackspace\Monitoring\v1\Api $api
 */
class CheckType extends OperatorResource implements Listable, Retrievable
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $category;

    /**
     * @var string
     */
    public $type;

    /**
     * @var array
     */
    public $fields;

    /**
     * {@inheritDoc}
     */
    public function retrieve()
    {
        $response = $this->executeWithState($this->api->getCheckType());
        $this->populateFromResponse($response);
    }
}