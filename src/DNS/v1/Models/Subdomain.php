<?php declare(strict_types=1);

namespace Rackspace\DNS\v1\Models;

use OpenCloud\Common\Resource\OperatorResource;
use OpenCloud\Common\Resource\Listable;

/**
 * Represents a Subdomain resource in the DNS v1 service
 *
 * @property \Rackspace\DNS\v1\Api $api
 */
class Subdomain extends OperatorResource implements Listable
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $comment;

    /**
     * @var string
     */
    public $updated;

    /**
     * @var string
     */
    public $emailAddress;

    /**
     * @var string
     */
    public $created;
}
