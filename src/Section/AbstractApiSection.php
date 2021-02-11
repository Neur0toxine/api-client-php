<?php

/**
 * PHP version 7.3
 *
 * @category AbstractApiSection
 * @package  RetailCrm\Api\Modules
 */

namespace RetailCrm\Api\Section;

use Psr\Http\Client\ClientInterface;
use RetailCrm\Api\Component\Utils;
use RetailCrm\Api\Enum\RequestMethod;
use RetailCrm\Api\Factory\RequestFactory;
use RetailCrm\Api\Factory\ResponseFactory;
use RetailCrm\Api\Interfaces\AuthenticatorInterface;
use RetailCrm\Api\Interfaces\RequestInterface;
use RetailCrm\Api\Interfaces\ResponseInterface;

/**
 * Class AbstractApiSection
 *
 * @category AbstractApiSection
 * @package  RetailCrm\Api\Modules
 */
abstract class AbstractApiSection
{
    /** @var string */
    protected $apiUrl;

    /** @var AuthenticatorInterface */
    protected $authenticator;

    /** @var ClientInterface */
    protected $httpClient;

    /** @var RequestFactory */
    protected $requestFactory;

    /** @var ResponseFactory */
    protected $responseFactory;

    /**
     * AbstractApiSection constructor.
     *
     * @param string                                           $apiUrl
     * @param \RetailCrm\Api\Interfaces\AuthenticatorInterface $authenticator
     * @param \Psr\Http\Client\ClientInterface                 $httpClient
     * @param \RetailCrm\Api\Factory\RequestFactory            $requestFactory
     * @param \RetailCrm\Api\Factory\ResponseFactory           $responseFactory
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function __construct(
        string $apiUrl,
        AuthenticatorInterface $authenticator,
        ClientInterface $httpClient,
        RequestFactory $requestFactory,
        ResponseFactory $responseFactory
    ) {
        $this->apiUrl         = Utils::removeTrailingSlash($apiUrl);
        $this->authenticator  = $authenticator;
        $this->httpClient = $httpClient;
        $this->requestFactory = $requestFactory;
        $this->responseFactory = $responseFactory;
    }

    /**
     * @param string $apiUrl
     *
     * @return AbstractApiSection
     */
    public function setApiUrl(string $apiUrl): AbstractApiSection
    {
        $this->apiUrl = $apiUrl;
        return $this;
    }

    /**
     * @param \RetailCrm\Api\Interfaces\AuthenticatorInterface $authenticator
     *
     * @return AbstractApiSection
     */
    public function setAuthenticator(AuthenticatorInterface $authenticator): AbstractApiSection
    {
        $this->authenticator = $authenticator;
        return $this;
    }

    /**
     * Returns route with base URI.
     *
     * @param string $route
     *
     * @return string
     */
    protected function route(string $route): string
    {
        return sprintf('%s/%s', $this->apiUrl, $route);
    }

    /**
     * Sends GET request to provided route, returns response of provided type.
     *
     * @param string                                          $route
     * @param \RetailCrm\Api\Interfaces\RequestInterface|null $request
     * @param string                                          $type
     *
     * @return \RetailCrm\Api\Interfaces\ResponseInterface
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @throws \RetailCrm\Api\Exception\ApiException
     * @throws \RetailCrm\Api\Exception\FactoryException
     */
    protected function sendGetRequest(string $route, ?RequestInterface $request, string $type): ResponseInterface
    {
        return $this->responseFactory->createResponse($this->httpClient->sendRequest(
            $this->requestFactory->createPsrRequest(
                RequestMethod::GET,
                $this->route($route),
                $request
            )
        ), $type);
    }
}
