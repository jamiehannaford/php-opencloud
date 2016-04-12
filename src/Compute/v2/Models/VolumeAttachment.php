<?php declare(strict_types=1);

namespace Rackspace\Compute\v2\Models;

use OpenCloud\Common\Resource\OperatorResource;
use OpenCloud\Common\Resource\Listable;
use OpenCloud\Common\Resource\Retrievable;

/**
 * Represents a VolumeAttachment resource in the Compute v2 service
 *
 * @property \Rackspace\Compute\v2\Api $api
 */
class VolumeAttachment extends OperatorResource implements Listable, Retrievable
{
    /**
     * @var string
     */
    public $device;

    /**
     * @var string
     */
    public $serverId;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $volumeId;

    protected $resourceKey = 'volumeAttachment';
    protected $resourcesKey = 'volumeAttachments';

    /**
     * {@inheritDoc}
     */
    public function retrieve()
    {
        $response = $this->executeWithState($this->api->getOsvolumeAttachment());
        $this->populateFromResponse($response);
    }
}