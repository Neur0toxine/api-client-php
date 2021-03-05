<?php

/**
 * PHP version 7.3
 *
 * @category ProductPropertiesFilterType
 * @package  RetailCrm\Api\Model\Filter\Store
 */

namespace RetailCrm\Api\Model\Filter\Store;

use RetailCrm\Api\Component\FormData\Mapping as Form;

/**
 * Class ProductPropertiesFilterType
 *
 * @category ProductPropertiesFilterType
 * @package  RetailCrm\Api\Model\Filter\Store
 */
class ProductPropertiesFilterType
{
    /**
     * @var string
     *
     * @Form\Type("string")
     * @Form\SerializedName("name")
     */
    public $name;

    /**
     * @var string
     *
     * @Form\Type("string")
     * @Form\SerializedName("code")
     */
    public $code;

    /**
     * @var string[]
     *
     * @Form\Type("string[]")
     * @Form\SerializedName("sites")
     */
    public $sites;
}