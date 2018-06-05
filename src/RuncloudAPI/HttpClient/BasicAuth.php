<?php

/**
 * Runcloud Basic Authentication
 *
 * @category HttpClient
 * @package  ClintDavis/RuncloudAPI
 */
namespace ClintDavis\RuncloudAPI\HttpClient;
/**
 * Basic Authentication class.
 *
 * @package ClintDavis/RuncloudAPI
 */
class BasicAuth
{
    /**
     * cURL handle.
     *
     * @var resource
     */
    protected $ch;
    /**
     * Consumer key.
     *
     * @var string
     */
    protected $api_key;
    /**
     * Consumer secret.
     *
     * @var string
     */
    protected $api_secret;
    /**
     * Do query string auth.
     *
     * @var bool
     */
    protected $doQueryString;
    /**
     * Request parameters.
     *
     * @var array
     */
    protected $parameters;
    /**
     * Initialize Basic Authentication class.
     *
     * @param resource $ch             cURL handle.
     * @param string   $api_key    Consumer key.
     * @param string   $api_secret Consumer Secret.
     * @param bool     $doQueryString  Do or not query string auth.
     * @param array    $parameters     Request parameters.
     */
    public function __construct($ch, $api_key, $api_secret, $doQueryString, $parameters = [])
    {
        $this->ch             = $ch;
        $this->api_key    = $api_key;
        $this->api_secret = $api_secret;
        $this->doQueryString  = $doQueryString;
        $this->parameters     = $parameters;
        $this->processAuth();
    }
    /**
     * Process auth.
     */
    protected function processAuth()
    {
        // TODO:: remove "if" part in case not required
        if ($this->doQueryString) {
            $this->parameters['api_key']    = $this->api_key;
            $this->parameters['api_secret'] = $this->api_secret;
        } else {
            \curl_setopt($this->ch, CURLOPT_USERPWD, $this->api_key . ':' . $this->api_secret);
        }
    }
    /**
     * Get parameters.
     *
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}