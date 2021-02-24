<?php

/**
 * PHP version 7.3
 *
 * @category OrderProduct
 * @package  RetailCrm\Api\Model\Entity\Loyalty
 */

namespace RetailCrm\Api\Model\Entity\Loyalty;

use JMS\Serializer\Annotation as JMS;

/**
 * Class OrderProduct
 *
 * @category OrderProduct
 * @package  RetailCrm\Api\Model\Entity\Loyalty
 */
class OrderProduct
{
    /**
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("bonusesChargeTotal")
     */
    public $bonusesChargeTotal;

    /**
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("bonusesCreditTotal")
     */
    public $bonusesCreditTotal;

    /**
     * @var \RetailCrm\Api\Model\Entity\Loyalty\PriceType
     *
     * @JMS\Type("RetailCrm\Api\Model\Entity\Loyalty\PriceType")
     * @JMS\SerializedName("priceType")
     */
    public $priceType;

    /**
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("initialPrice")
     */
    public $initialPrice;

    /**
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("discountTotal")
     */
    public $discountTotal;

    /**
     * @var \RetailCrm\Api\Model\Entity\Loyalty\OrderProductPriceItem[]
     *
     * @JMS\Type("array<RetailCrm\Api\Model\Entity\Loyalty\OrderProductPriceItem>")
     * @JMS\SerializedName("prices")
     */
    public $prices;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("vatRate")
     */
    public $vatRate;

    /**
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("quantity")
     */
    public $quantity;
}
