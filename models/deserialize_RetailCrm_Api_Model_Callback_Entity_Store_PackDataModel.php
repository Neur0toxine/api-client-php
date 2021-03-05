<?php

function deserialize_RetailCrm_Api_Model_Callback_Entity_Store_PackDataModel(array $jsonData): RetailCrm\Api\Model\Callback\Entity\Store\PackDataModel
{
    
$model = new RetailCrm\Api\Model\Callback\Entity\Store\PackDataModel();
if (isset($jsonData['item'])) {
    
$model->item = new RetailCrm\Api\Model\Callback\Entity\Store\PackItemModel();
if (isset($jsonData['item']['id'])) {
    $model->item->id = $jsonData['item']['id'];

}
if (isset($jsonData['item']['externalIds'])) {
    $model->item->externalIds = [];
foreach (array_keys($jsonData['item']['externalIds']) as $index32) {
    
$model->item->externalIds[$index32] = new RetailCrm\Api\Model\Entity\CodeValueModel();
if (isset($jsonData['item']['externalIds'][$index32]['code'])) {
    $model->item->externalIds[$index32]->code = $jsonData['item']['externalIds'][$index32]['code'];

}
if (isset($jsonData['item']['externalIds'][$index32]['value'])) {
    $model->item->externalIds[$index32]->value = $jsonData['item']['externalIds'][$index32]['value'];

}


}

}


}
if (isset($jsonData['offer'])) {
    
$model->offer = new RetailCrm\Api\Model\Entity\Store\Offer();
if (isset($jsonData['offer']['displayName'])) {
    $model->offer->displayName = $jsonData['offer']['displayName'];

}
if (isset($jsonData['offer']['id'])) {
    $model->offer->id = $jsonData['offer']['id'];

}
if (isset($jsonData['offer']['externalId'])) {
    $model->offer->externalId = $jsonData['offer']['externalId'];

}
if (isset($jsonData['offer']['xmlId'])) {
    $model->offer->xmlId = $jsonData['offer']['xmlId'];

}
if (isset($jsonData['offer']['name'])) {
    $model->offer->name = $jsonData['offer']['name'];

}
if (isset($jsonData['offer']['article'])) {
    $model->offer->article = $jsonData['offer']['article'];

}
if (isset($jsonData['offer']['vatRate'])) {
    $model->offer->vatRate = $jsonData['offer']['vatRate'];

}
if (isset($jsonData['offer']['unit'])) {
    
$model->offer->unit = new RetailCrm\Api\Model\Entity\Orders\Items\Unit();
if (isset($jsonData['offer']['unit']['code'])) {
    $model->offer->unit->code = $jsonData['offer']['unit']['code'];

}
if (isset($jsonData['offer']['unit']['name'])) {
    $model->offer->unit->name = $jsonData['offer']['unit']['name'];

}
if (isset($jsonData['offer']['unit']['sym'])) {
    $model->offer->unit->sym = $jsonData['offer']['unit']['sym'];

}


}
if (isset($jsonData['offer']['barcode'])) {
    $model->offer->barcode = $jsonData['offer']['barcode'];

}
if (isset($jsonData['offer']['properties'])) {
    $model->offer->properties = [];
foreach (array_keys($jsonData['offer']['properties']) as $index32) {
    $model->offer->properties[$index32] = $jsonData['offer']['properties'][$index32];

}

}
if (isset($jsonData['offer']['site'])) {
    $model->offer->site = $jsonData['offer']['site'];

}
if (isset($jsonData['offer']['purchasePrice'])) {
    $model->offer->purchasePrice = (float) $jsonData['offer']['purchasePrice'];

}
if (isset($jsonData['offer']['quantity'])) {
    $model->offer->quantity = (float) $jsonData['offer']['quantity'];

}
if (isset($jsonData['offer']['stores'])) {
    $model->offer->stores = [];
foreach (array_keys($jsonData['offer']['stores']) as $index28) {
    
$model->offer->stores[$index28] = new RetailCrm\Api\Model\Entity\Store\Inventory();
if (isset($jsonData['offer']['stores'][$index28]['quantity'])) {
    $model->offer->stores[$index28]->quantity = (float) $jsonData['offer']['stores'][$index28]['quantity'];

}
if (isset($jsonData['offer']['stores'][$index28]['purchasePrice'])) {
    $model->offer->stores[$index28]->purchasePrice = (float) $jsonData['offer']['stores'][$index28]['purchasePrice'];

}
if (isset($jsonData['offer']['stores'][$index28]['store'])) {
    $model->offer->stores[$index28]->store = $jsonData['offer']['stores'][$index28]['store'];

}
if (isset($jsonData['offer']['stores'][$index28]['code'])) {
    $model->offer->stores[$index28]->code = $jsonData['offer']['stores'][$index28]['code'];

}
if (isset($jsonData['offer']['stores'][$index28]['available'])) {
    $model->offer->stores[$index28]->available = (float) $jsonData['offer']['stores'][$index28]['available'];

}


}

}


}
if (isset($jsonData['quantity'])) {
    $model->quantity = (float) $jsonData['quantity'];

}
if (isset($jsonData['store'])) {
    $model->store = $jsonData['store'];

}
if (isset($jsonData['purchasePrice'])) {
    $model->purchasePrice = (float) $jsonData['purchasePrice'];

}
if (isset($jsonData['shipmentDate'])) {
    $model->shipmentDate = \DateTime::createFromFormat('Y-m-d', $jsonData['shipmentDate']);

}
if (isset($jsonData['invoiceNumber'])) {
    $model->invoiceNumber = $jsonData['invoiceNumber'];

}
if (isset($jsonData['deliveryNoteNumber'])) {
    $model->deliveryNoteNumber = $jsonData['deliveryNoteNumber'];

}



    return $model;
}