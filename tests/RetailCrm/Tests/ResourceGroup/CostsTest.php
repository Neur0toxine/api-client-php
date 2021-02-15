<?php

/**
 * PHP version 7.3
 *
 * @category CostsTest
 * @package  RetailCrm\Tests\ResourceGroup
 */

namespace RetailCrm\Tests\ResourceGroup;

use DateTime;
use RetailCrm\Api\Enum\RequestMethod;
use RetailCrm\Api\Model\Entity\Costs\Cost;
use RetailCrm\Api\Model\Filter\Costs\CostsFilter;
use RetailCrm\Api\Model\Request\Costs\CostsCreateRequest;
use RetailCrm\Api\Model\Request\Costs\CostsDeleteRequest;
use RetailCrm\Api\Model\Request\Costs\CostsEditRequest;
use RetailCrm\Api\Model\Request\Costs\CostsRequest;
use RetailCrm\Api\Model\Request\Costs\CostsUploadRequest;
use RetailCrm\Api\Model\Source;
use RetailCrm\Test\TestClientFactory;

/**
 * Class CostsTest
 *
 * @category CostsTest
 * @package  RetailCrm\Tests\ResourceGroup
 */
class CostsTest extends AbstractApiResourceGroupTest
{
    public function testCosts(): void
    {
        $json = <<<'EOF'
{
  "success": true,
  "pagination": {
    "limit": 20,
    "totalCount": 7,
    "currentPage": 1,
    "totalPageCount": 1
  },
  "costs": [
    {
      "id": 739,
      "dateFrom": "2019-03-26",
      "dateTo": "2019-03-26",
      "summ": 20,
      "costItem": "products-purchase-price",
      "createdAt": "2019-03-26 15:33:50",
      "createdBy": "19",
      "order": {
        "id": 2452,
        "number": "2452C"
      },
      "sites": [
        "moysklad"
      ]
    }
  ]
}
EOF;

        $costsRequest = new CostsRequest();
        $costsRequest->limit = 20;
        $costsRequest->page = 1;
        $costsRequest->filter = new CostsFilter();
        $costsRequest->filter->sites = ['moysklad', 'aliexpress'];
        $costsRequest->filter->maxSumm = 20;

        $mock = static::getMockClient();
        $mock->on(
            static::createRequestMatcher('costs')
                ->setMethod(RequestMethod::GET)
                ->setQueryParams(static::encodeFormArray($costsRequest)),
            static::responseJson(200, $json)
        );

        $client = TestClientFactory::createClient($mock);
        $costs  = $client->costs->costs($costsRequest);

        self::assertModelEqualsToResponse($json, $costs);
    }

    public function testCostsCreate(): void
    {
        $json = <<<'EOF'
{
  "success": true,
  "id": 1
}
EOF;

        $request                         = new CostsCreateRequest();
        $request->site                   = 'aliexpress';
        $request->cost                   = new Cost();
        $request->cost->sites            = ['aliexpress'];
        $request->cost->source           = new Source();
        $request->cost->source->source   = 'source';
        $request->cost->source->campaign = 'campaign';
        $request->cost->source->content  = 'content';
        $request->cost->source->keyword  = 'keyword';
        $request->cost->source->medium   = 'medium';
        $request->cost->comment          = 'comment';
        $request->cost->costItem         = 'products-purchase-price';
        $request->cost->createdAt        = new DateTime();
        $request->cost->dateFrom         = new DateTime();
        $request->cost->dateTo           = new DateTime();
        $request->cost->summ             = 100.10;

        $mock = static::getMockClient();
        $mock->on(
            static::createRequestMatcher('costs/create')
                ->setMethod(RequestMethod::POST)
                ->setBody(static::encodeForm($request)),
            static::responseJson(200, $json)
        );

        $client   = TestClientFactory::createClient($mock);
        $response = $client->costs->create($request);

        self::assertModelEqualsToResponse($json, $response);
    }

    public function testCostsDelete(): void
    {
        $json = <<<'EOF'
{
  "success": true,
  "count": 4,
  "notRemovedIds": [13, 21]
}
EOF;

        $request                         = new CostsDeleteRequest();
        $request->ids = [2, 3, 5, 8, 13, 21];

        $mock = static::getMockClient();
        $mock->on(
            static::createRequestMatcher('costs/delete')
                ->setMethod(RequestMethod::POST)
                ->setBody(static::encodeForm($request)),
            static::responseJson(200, $json)
        );

        $client   = TestClientFactory::createClient($mock);
        $response = $client->costs->costsDelete($request);

        self::assertModelEqualsToResponse($json, $response);
    }


    public function testCostsUpload(): void
    {
        $json = <<<'EOF'
{
  "success": true,
  "uploadedCosts": [1]
}
EOF;

        $request                = new CostsUploadRequest();
        $cost                   = new Cost();
        $cost->sites            = ['aliexpress'];
        $cost->source           = new Source();
        $cost->source->source   = 'source';
        $cost->source->campaign = 'campaign';
        $cost->source->content  = 'content';
        $cost->source->keyword  = 'keyword';
        $cost->source->medium   = 'medium';
        $cost->comment          = 'comment';
        $cost->costItem         = 'products-purchase-price';
        $cost->createdAt        = new DateTime();
        $cost->dateFrom         = new DateTime();
        $cost->dateTo           = new DateTime();
        $cost->summ             = 100.10;
        $request->costs         = [$cost];

        $mock = static::getMockClient();
        $mock->on(
            static::createRequestMatcher('costs/upload')
                ->setMethod(RequestMethod::POST)
                ->setBody(static::encodeForm($request)),
            static::responseJson(200, $json)
        );

        $client   = TestClientFactory::createClient($mock);
        $response = $client->costs->costsUpload($request);

        self::assertModelEqualsToResponse($json, $response);
    }

    public function testGet(): void
    {
        $json = <<<'EOF'
{
  "success": true,
  "cost": {
    "id": 739,
    "dateFrom": "2019-03-26",
    "dateTo": "2019-03-26",
    "summ": 20,
    "costItem": "products-purchase-price",
    "createdAt": "2019-03-26 15:33:50",
    "createdBy": "19",
    "order": {
      "id": 2452,
      "number": "2452C"
    },
    "sites": [
      "moysklad"
    ]
  }
}
EOF;

        $mock = static::getMockClient();
        $mock->on(
            static::createRequestMatcher('costs/739')
                ->setMethod(RequestMethod::GET),
            static::responseJson(200, $json)
        );

        $client = TestClientFactory::createClient($mock);
        $costs  = $client->costs->get(739);

        self::assertModelEqualsToResponse($json, $costs);
    }

    public function testDelete(): void
    {
        $json = <<<'EOF'
{
  "success": true
}
EOF;

        $mock = static::getMockClient();
        $mock->on(
            static::createRequestMatcher('costs/739/delete')
                ->setMethod(RequestMethod::POST),
            static::responseJson(200, $json)
        );

        $client    = TestClientFactory::createClient($mock);
        $response  = $client->costs->delete(739);

        self::assertTrue($response->success);
    }

    public function testEdit(): void
    {
        $json = <<<'EOF'
{
  "success": true,
  "id": 1
}
EOF;

        $request                         = new CostsEditRequest();
        $request->site                   = 'aliexpress';
        $request->cost                   = new Cost();
        $request->cost->sites            = ['aliexpress'];
        $request->cost->source           = new Source();
        $request->cost->source->source   = 'source';
        $request->cost->source->campaign = 'campaign';
        $request->cost->source->content  = 'content';
        $request->cost->source->keyword  = 'keyword';
        $request->cost->source->medium   = 'medium';
        $request->cost->comment          = 'comment';
        $request->cost->costItem         = 'products-purchase-price';
        $request->cost->createdAt        = new DateTime();
        $request->cost->dateFrom         = new DateTime();
        $request->cost->dateTo           = new DateTime();
        $request->cost->summ             = 100.10;

        $mock = static::getMockClient();
        $mock->on(
            static::createRequestMatcher('costs/1/edit')
                ->setMethod(RequestMethod::POST)
                ->setBody(static::encodeForm($request)),
            static::responseJson(200, $json)
        );

        $client   = TestClientFactory::createClient($mock);
        $response = $client->costs->edit(1, $request);

        self::assertModelEqualsToResponse($json, $response);
    }
}
