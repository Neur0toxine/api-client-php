<?php

function serialize_RetailCrm_Api_Model_Entity_Order_SerializedOrderReference(RetailCrm\Api\Model\Entity\Order\SerializedOrderReference $model, bool $useStdClass = true)
{
    $emptyHashmap = $useStdClass ? new \stdClass() : [];
    $emptyObject = $useStdClass ? new \stdClass() : [];

    $jsonData = [];
if (null !== $model->id) {
    $jsonData["id"] = $model->id;
}

if (0 === \count($jsonData)) {
    $jsonData = $emptyObject;
}


    return $jsonData;
}