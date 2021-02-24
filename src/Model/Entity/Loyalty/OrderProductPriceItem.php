<?php

/**
 * PHP version 7.3
 *
 * @category OrderProductPriceItem
 * @package  RetailCrm\Api\Model\Entity\Loyalty
 */

namespace RetailCrm\Api\Model\Entity\Loyalty;

use JMS\Serializer\Annotation as JMS;

/**
 * Class OrderProductPriceItem
 *
 * @category OrderProductPriceItem
 * @package  RetailCrm\Api\Model\Entity\Loyalty
 */
class OrderProductPriceItem
{
    /**
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("price")
     */
    public $price;

    /**
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("quantity")
     */
    public $quantity;
}
