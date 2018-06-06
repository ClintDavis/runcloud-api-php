<?php

/*
* This Class handles the communication with the RunCloud API
* https://runcloud.io/api/welcome.html
* @category Client
* @package ClintDavis/RuncloudAPI
*/

namespace ClintDavis\RuncloudAPI;

use ClintDavis\RuncloudAPI\HttpClient\HttpClient;

/**
 * RunCloud REST API Client class.
 *
 * @package ClintDavis/RuncloudAPI
 */

class Client
{
    /**
    * Runcloud REST API Client version.
    */
    const VERSION = '1.0.0';

    /**
     * HttpClient instance.
     *
     * @var HttpClient
     */
    public $http;

    /**
     * A filename for a verbose request log.
     *
     * @var string
     */
    public static $debugRequests = NULL;

    /**
     * Retries the request if RunCloud rate limits the client
     *
     * @var bool
     */
    public static $retry = FALSE;
  
    /**
     * Initialize client.
     *
     * @param string $api_key    Runcloud API Key
     * @param string $api_secret     Runcloud API Secret
     * @param array  $options    Options (version, timeout, verify_ssl).
     *
     * @internal
     */
    public function __construct($api_key, $api_secret, $options = []) {
        $this->http = new HttpClient($api_key, $api_secret, $options);
    }
  
    /**
     * POST method.
     *
     * @param string $endpoint API endpoint.
     * @param array  $data     Request data.
     *
     * @return array
     */
    public function post($endpoint, $data)
    {
        return $this->http->request($endpoint, 'POST', $data);
    }
    /**
     * PUT method.
     *
     * @param string $endpoint API endpoint.
     * @param array  $data     Request data.
     *
     * @return array
     */
    public function put($endpoint, $data)
    {
        return $this->http->request($endpoint, 'PUT', $data);
    }
    /**
     * GET method.
     *
     * @param string $endpoint   API endpoint.
     * @param array  $parameters Request parameters.
     *
     * @return array
     */
    public function get($endpoint, $parameters = [])
    {
        return $this->http->request($endpoint, 'GET', [], $parameters);
    }
    /**
     * DELETE method.
     *
     * @param string $endpoint   API endpoint.
     * @param array  $parameters Request parameters.
     *
     * @return array
     */
    public function delete($endpoint, $parameters = [])
    {
        return $this->http->request($endpoint, 'DELETE', [], $parameters);
    }
    /**
     * OPTIONS method.
     *
     * @param string $endpoint API endpoint.
     *
     * @return array
     */
    public function options($endpoint)
    {
        return $this->http->request($endpoint, 'OPTIONS', [], []);
    }
}