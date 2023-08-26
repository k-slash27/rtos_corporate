<?php
/**
 * AttendanceSubscriberStateChangesApi
 * PHP version 7.4
 *
 * @category Class
 * @package  HubSpot\Client\Marketing\Events
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Marketing Events Extension
 *
 * These APIs allow you to interact with HubSpot's Marketing Events Extension. It allows you to: * Create, Read or update Marketing Event information in HubSpot * Specify whether a HubSpot contact has registered, attended or cancelled a registration to a Marketing Event. * Specify a URL that can be called to get the details of a Marketing Event.
 *
 * The version of the OpenAPI document: v3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace HubSpot\Client\Marketing\Events\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use HubSpot\Client\Marketing\Events\ApiException;
use HubSpot\Client\Marketing\Events\Configuration;
use HubSpot\Client\Marketing\Events\HeaderSelector;
use HubSpot\Client\Marketing\Events\ObjectSerializer;

/**
 * AttendanceSubscriberStateChangesApi Class Doc Comment
 *
 * @category Class
 * @package  HubSpot\Client\Marketing\Events
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class AttendanceSubscriberStateChangesApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation create
     *
     * Record
     *
     * @param  string $external_event_id The id of the marketing event (required)
     * @param  string $subscriber_state The new subscriber state for the HubSpot contacts and the specified marketing event. For example: &#39;register&#39;, &#39;attend&#39; or &#39;cancel&#39;. (required)
     * @param  \HubSpot\Client\Marketing\Events\Model\BatchInputMarketingEventSubscriber $batch_input_marketing_event_subscriber The details of the contacts to subscribe to the event. Parameters of join and left time if state is Attended. (required)
     * @param  string $external_account_id The account id associated with the marketing event (optional)
     *
     * @throws \HubSpot\Client\Marketing\Events\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \HubSpot\Client\Marketing\Events\Model\BatchResponseSubscriberVidResponse|\HubSpot\Client\Marketing\Events\Model\Error
     */
    public function create($external_event_id, $subscriber_state, $batch_input_marketing_event_subscriber, $external_account_id = null)
    {
        list($response) = $this->createWithHttpInfo($external_event_id, $subscriber_state, $batch_input_marketing_event_subscriber, $external_account_id);
        return $response;
    }

    /**
     * Operation createWithHttpInfo
     *
     * Record
     *
     * @param  string $external_event_id The id of the marketing event (required)
     * @param  string $subscriber_state The new subscriber state for the HubSpot contacts and the specified marketing event. For example: &#39;register&#39;, &#39;attend&#39; or &#39;cancel&#39;. (required)
     * @param  \HubSpot\Client\Marketing\Events\Model\BatchInputMarketingEventSubscriber $batch_input_marketing_event_subscriber The details of the contacts to subscribe to the event. Parameters of join and left time if state is Attended. (required)
     * @param  string $external_account_id The account id associated with the marketing event (optional)
     *
     * @throws \HubSpot\Client\Marketing\Events\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \HubSpot\Client\Marketing\Events\Model\BatchResponseSubscriberVidResponse|\HubSpot\Client\Marketing\Events\Model\Error, HTTP status code, HTTP response headers (array of strings)
     */
    public function createWithHttpInfo($external_event_id, $subscriber_state, $batch_input_marketing_event_subscriber, $external_account_id = null)
    {
        $request = $this->createRequest($external_event_id, $subscriber_state, $batch_input_marketing_event_subscriber, $external_account_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\HubSpot\Client\Marketing\Events\Model\BatchResponseSubscriberVidResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\HubSpot\Client\Marketing\Events\Model\BatchResponseSubscriberVidResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Marketing\Events\Model\BatchResponseSubscriberVidResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\HubSpot\Client\Marketing\Events\Model\Error' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\HubSpot\Client\Marketing\Events\Model\Error' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Marketing\Events\Model\Error', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\HubSpot\Client\Marketing\Events\Model\BatchResponseSubscriberVidResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Marketing\Events\Model\BatchResponseSubscriberVidResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Marketing\Events\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createAsync
     *
     * Record
     *
     * @param  string $external_event_id The id of the marketing event (required)
     * @param  string $subscriber_state The new subscriber state for the HubSpot contacts and the specified marketing event. For example: &#39;register&#39;, &#39;attend&#39; or &#39;cancel&#39;. (required)
     * @param  \HubSpot\Client\Marketing\Events\Model\BatchInputMarketingEventSubscriber $batch_input_marketing_event_subscriber The details of the contacts to subscribe to the event. Parameters of join and left time if state is Attended. (required)
     * @param  string $external_account_id The account id associated with the marketing event (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAsync($external_event_id, $subscriber_state, $batch_input_marketing_event_subscriber, $external_account_id = null)
    {
        return $this->createAsyncWithHttpInfo($external_event_id, $subscriber_state, $batch_input_marketing_event_subscriber, $external_account_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createAsyncWithHttpInfo
     *
     * Record
     *
     * @param  string $external_event_id The id of the marketing event (required)
     * @param  string $subscriber_state The new subscriber state for the HubSpot contacts and the specified marketing event. For example: &#39;register&#39;, &#39;attend&#39; or &#39;cancel&#39;. (required)
     * @param  \HubSpot\Client\Marketing\Events\Model\BatchInputMarketingEventSubscriber $batch_input_marketing_event_subscriber The details of the contacts to subscribe to the event. Parameters of join and left time if state is Attended. (required)
     * @param  string $external_account_id The account id associated with the marketing event (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAsyncWithHttpInfo($external_event_id, $subscriber_state, $batch_input_marketing_event_subscriber, $external_account_id = null)
    {
        $returnType = '\HubSpot\Client\Marketing\Events\Model\BatchResponseSubscriberVidResponse';
        $request = $this->createRequest($external_event_id, $subscriber_state, $batch_input_marketing_event_subscriber, $external_account_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'create'
     *
     * @param  string $external_event_id The id of the marketing event (required)
     * @param  string $subscriber_state The new subscriber state for the HubSpot contacts and the specified marketing event. For example: &#39;register&#39;, &#39;attend&#39; or &#39;cancel&#39;. (required)
     * @param  \HubSpot\Client\Marketing\Events\Model\BatchInputMarketingEventSubscriber $batch_input_marketing_event_subscriber The details of the contacts to subscribe to the event. Parameters of join and left time if state is Attended. (required)
     * @param  string $external_account_id The account id associated with the marketing event (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createRequest($external_event_id, $subscriber_state, $batch_input_marketing_event_subscriber, $external_account_id = null)
    {
        // verify the required parameter 'external_event_id' is set
        if ($external_event_id === null || (is_array($external_event_id) && count($external_event_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $external_event_id when calling create'
            );
        }
        // verify the required parameter 'subscriber_state' is set
        if ($subscriber_state === null || (is_array($subscriber_state) && count($subscriber_state) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscriber_state when calling create'
            );
        }
        // verify the required parameter 'batch_input_marketing_event_subscriber' is set
        if ($batch_input_marketing_event_subscriber === null || (is_array($batch_input_marketing_event_subscriber) && count($batch_input_marketing_event_subscriber) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $batch_input_marketing_event_subscriber when calling create'
            );
        }

        $resourcePath = '/marketing/v3/marketing-events/attendance/{externalEventId}/{subscriberState}/create';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $external_account_id,
            'externalAccountId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($external_event_id !== null) {
            $resourcePath = str_replace(
                '{' . 'externalEventId' . '}',
                ObjectSerializer::toPathValue($external_event_id),
                $resourcePath
            );
        }
        // path params
        if ($subscriber_state !== null) {
            $resourcePath = str_replace(
                '{' . 'subscriberState' . '}',
                ObjectSerializer::toPathValue($subscriber_state),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', '*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', '*/*'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($batch_input_marketing_event_subscriber)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($batch_input_marketing_event_subscriber));
            } else {
                $httpBody = $batch_input_marketing_event_subscriber;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createByEmail
     *
     * Record
     *
     * @param  string $external_event_id The id of the marketing event (required)
     * @param  string $subscriber_state The new subscriber state for the HubSpot contacts and the specified marketing event. For example: &#39;register&#39;, &#39;attend&#39; or &#39;cancel&#39;. (required)
     * @param  \HubSpot\Client\Marketing\Events\Model\BatchInputMarketingEventEmailSubscriber $batch_input_marketing_event_email_subscriber The details of the contacts to subscribe to the event. Parameters of join and left time if state is Attended. (required)
     * @param  string $external_account_id The account id associated with the marketing event (optional)
     *
     * @throws \HubSpot\Client\Marketing\Events\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \HubSpot\Client\Marketing\Events\Model\BatchResponseSubscriberEmailResponse|\HubSpot\Client\Marketing\Events\Model\Error
     */
    public function createByEmail($external_event_id, $subscriber_state, $batch_input_marketing_event_email_subscriber, $external_account_id = null)
    {
        list($response) = $this->createByEmailWithHttpInfo($external_event_id, $subscriber_state, $batch_input_marketing_event_email_subscriber, $external_account_id);
        return $response;
    }

    /**
     * Operation createByEmailWithHttpInfo
     *
     * Record
     *
     * @param  string $external_event_id The id of the marketing event (required)
     * @param  string $subscriber_state The new subscriber state for the HubSpot contacts and the specified marketing event. For example: &#39;register&#39;, &#39;attend&#39; or &#39;cancel&#39;. (required)
     * @param  \HubSpot\Client\Marketing\Events\Model\BatchInputMarketingEventEmailSubscriber $batch_input_marketing_event_email_subscriber The details of the contacts to subscribe to the event. Parameters of join and left time if state is Attended. (required)
     * @param  string $external_account_id The account id associated with the marketing event (optional)
     *
     * @throws \HubSpot\Client\Marketing\Events\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \HubSpot\Client\Marketing\Events\Model\BatchResponseSubscriberEmailResponse|\HubSpot\Client\Marketing\Events\Model\Error, HTTP status code, HTTP response headers (array of strings)
     */
    public function createByEmailWithHttpInfo($external_event_id, $subscriber_state, $batch_input_marketing_event_email_subscriber, $external_account_id = null)
    {
        $request = $this->createByEmailRequest($external_event_id, $subscriber_state, $batch_input_marketing_event_email_subscriber, $external_account_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\HubSpot\Client\Marketing\Events\Model\BatchResponseSubscriberEmailResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\HubSpot\Client\Marketing\Events\Model\BatchResponseSubscriberEmailResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Marketing\Events\Model\BatchResponseSubscriberEmailResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\HubSpot\Client\Marketing\Events\Model\Error' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\HubSpot\Client\Marketing\Events\Model\Error' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Marketing\Events\Model\Error', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\HubSpot\Client\Marketing\Events\Model\BatchResponseSubscriberEmailResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Marketing\Events\Model\BatchResponseSubscriberEmailResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Marketing\Events\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createByEmailAsync
     *
     * Record
     *
     * @param  string $external_event_id The id of the marketing event (required)
     * @param  string $subscriber_state The new subscriber state for the HubSpot contacts and the specified marketing event. For example: &#39;register&#39;, &#39;attend&#39; or &#39;cancel&#39;. (required)
     * @param  \HubSpot\Client\Marketing\Events\Model\BatchInputMarketingEventEmailSubscriber $batch_input_marketing_event_email_subscriber The details of the contacts to subscribe to the event. Parameters of join and left time if state is Attended. (required)
     * @param  string $external_account_id The account id associated with the marketing event (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createByEmailAsync($external_event_id, $subscriber_state, $batch_input_marketing_event_email_subscriber, $external_account_id = null)
    {
        return $this->createByEmailAsyncWithHttpInfo($external_event_id, $subscriber_state, $batch_input_marketing_event_email_subscriber, $external_account_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createByEmailAsyncWithHttpInfo
     *
     * Record
     *
     * @param  string $external_event_id The id of the marketing event (required)
     * @param  string $subscriber_state The new subscriber state for the HubSpot contacts and the specified marketing event. For example: &#39;register&#39;, &#39;attend&#39; or &#39;cancel&#39;. (required)
     * @param  \HubSpot\Client\Marketing\Events\Model\BatchInputMarketingEventEmailSubscriber $batch_input_marketing_event_email_subscriber The details of the contacts to subscribe to the event. Parameters of join and left time if state is Attended. (required)
     * @param  string $external_account_id The account id associated with the marketing event (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createByEmailAsyncWithHttpInfo($external_event_id, $subscriber_state, $batch_input_marketing_event_email_subscriber, $external_account_id = null)
    {
        $returnType = '\HubSpot\Client\Marketing\Events\Model\BatchResponseSubscriberEmailResponse';
        $request = $this->createByEmailRequest($external_event_id, $subscriber_state, $batch_input_marketing_event_email_subscriber, $external_account_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createByEmail'
     *
     * @param  string $external_event_id The id of the marketing event (required)
     * @param  string $subscriber_state The new subscriber state for the HubSpot contacts and the specified marketing event. For example: &#39;register&#39;, &#39;attend&#39; or &#39;cancel&#39;. (required)
     * @param  \HubSpot\Client\Marketing\Events\Model\BatchInputMarketingEventEmailSubscriber $batch_input_marketing_event_email_subscriber The details of the contacts to subscribe to the event. Parameters of join and left time if state is Attended. (required)
     * @param  string $external_account_id The account id associated with the marketing event (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createByEmailRequest($external_event_id, $subscriber_state, $batch_input_marketing_event_email_subscriber, $external_account_id = null)
    {
        // verify the required parameter 'external_event_id' is set
        if ($external_event_id === null || (is_array($external_event_id) && count($external_event_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $external_event_id when calling createByEmail'
            );
        }
        // verify the required parameter 'subscriber_state' is set
        if ($subscriber_state === null || (is_array($subscriber_state) && count($subscriber_state) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscriber_state when calling createByEmail'
            );
        }
        // verify the required parameter 'batch_input_marketing_event_email_subscriber' is set
        if ($batch_input_marketing_event_email_subscriber === null || (is_array($batch_input_marketing_event_email_subscriber) && count($batch_input_marketing_event_email_subscriber) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $batch_input_marketing_event_email_subscriber when calling createByEmail'
            );
        }

        $resourcePath = '/marketing/v3/marketing-events/attendance/{externalEventId}/{subscriberState}/email-create';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $external_account_id,
            'externalAccountId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($external_event_id !== null) {
            $resourcePath = str_replace(
                '{' . 'externalEventId' . '}',
                ObjectSerializer::toPathValue($external_event_id),
                $resourcePath
            );
        }
        // path params
        if ($subscriber_state !== null) {
            $resourcePath = str_replace(
                '{' . 'subscriberState' . '}',
                ObjectSerializer::toPathValue($subscriber_state),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', '*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', '*/*'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($batch_input_marketing_event_email_subscriber)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($batch_input_marketing_event_email_subscriber));
            } else {
                $httpBody = $batch_input_marketing_event_email_subscriber;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
