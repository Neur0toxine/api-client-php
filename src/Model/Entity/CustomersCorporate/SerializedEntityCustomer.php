<?php

/**
 * PHP version 7.3
 *
 * @category SerializedEntityCustomer
 * @package  RetailCrm\Api\Model\Entity\CustomersCorporate
 */

namespace RetailCrm\Api\Model\Entity\CustomersCorporate;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SerializedEntityCustomer
 *
 * @category SerializedEntityCustomer
 * @package  RetailCrm\Api\Model\Entity\CustomersCorporate
 */
class SerializedEntityCustomer
{
    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("site")
     */
    public $site;

    /**
     * @var int
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("id")
     */
    public $id;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("externalId")
     */
    public $externalId;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     */
    public $type;
}