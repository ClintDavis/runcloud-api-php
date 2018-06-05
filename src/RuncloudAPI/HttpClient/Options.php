<?php
/**
 * Runcloud REST API HTTP Client Options
 *
 * @category HttpClient
 * @package  ClintDavis/RuncloudAPI
 */
namespace ClintDavis\RuncloudAPI\HttpClient;
/**
 * REST API HTTP Client Options class.
 *
 * @package ClintDavis/RuncloudAPI
 */
class Options
{
    /**
     * Runcloud REST API wrapper version.
     */
    const VERSION = '1.0.0';
    /**
     * Default request timeout.
     */
    const TIMEOUT = 15;
    /**
     * Default Runcloud API prefix.
     * Including leading and trailing slashes.
     */
    const RUNCLOUD_API_PREFIX = '/base-api/';
    /**
     * Default Runcloud API prefix.
     * Including leading and trailing slashes.
     */
    const RUNCLOUD_API_URL = 'https://manage.runcloud.io';
    /**
     * Default User Agent.
     * No version number.
     */
    const USER_AGENT = 'Runcloud API Client-PHP';
    /**
     * Options.
     *
     * @var array
     */
    private $options;
    /**
     * Initialize HTTP client options.
     *
     * @param array $options Client options.
     */
    public function __construct($options)
    {
        $this->options = $options;
    }
    /**
     * Get API version.
     *
     * @return string
     */
    public function getVersion()
    {
        return isset($this->options['version']) ? $this->options['version'] : self::VERSION;
    }
    /**
     * Check if need to verify SSL.
     *
     * @return bool
     */
    public function verifySsl()
    {
        return isset($this->options['verify_ssl']) ? (bool) $this->options['verify_ssl'] : true;
    }
    /**
     * Get timeout.
     *
     * @return int
     */
    public function getTimeout()
    {
        return isset($this->options['timeout']) ? (int) $this->options['timeout'] : self::TIMEOUT;
    }
    /**
     * Basic Authentication as query string.
     * Some old servers are not able to use CURLOPT_USERPWD.
     *
     * @return bool
     */
    public function isQueryStringAuth()
    {
        return isset($this->options['query_string_auth']) ? (bool) $this->options['query_string_auth'] : false;
    }
    /**
     * Check if is WP REST API.
     *
     * @return bool
     */
    public function runcloudUrl()
    {
        return isset($this->options['runcloud_url']) ? (bool) $this->options['runcloud_url'] : self::RUNCLOUD_API_URL;
    }
    /**
     * Custom API Prefix for WP API.
     *
     * @return string
     */
    public function apiPrefix()
    {
        return isset($this->options['RUNCLOUD_API_PREFIX']) ? $this->options['RUNCLOUD_API_PREFIX'] : self::RUNCLOUD_API_PREFIX;
    }
    /**
     * Custom user agent.
     * 
     * @return string
     */
    public function userAgent()
    {
        return isset($this->options['user_agent']) ? $this->options['user_agent'] : self::USER_AGENT;
    }
    /**
     * Get follow redirects
     *
     * @return bool
     */
    public function getFollowRedirects() {
        // TODO:: check and remove if not needed
        return isset($this->options['follow_redirects']) ? (bool)$this->options['follow_redirects'] : false;
    }
}
