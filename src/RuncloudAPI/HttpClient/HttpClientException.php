<?php
/**
 * Runcloud REST API HTTP Client Exception
 *
 * @category HttpClient
 * @package  ClintDavis/RuncloudAPI
 */
namespace ClintDavis\RuncloudAPI\HttpClient;

use ClintDavis\RuncloudAPI\HttpClient\Request;
use ClintDavis\RuncloudAPI\HttpClient\Response;
/**
 * REST API HTTP Client Exception class.
 *
 * @package ClintDavis/RuncloudAPI
 */
class HttpClientException extends \Exception
{
    /**
     * Request.
     *
     * @var Request
     */
    private $request;
    /**
     * Response.
     *
     * @var Response
     */
    private $response;
    /**
     * Initialize exception.
     *
     * @param string   $message  Error message.
     * @param int      $code     Error code.
     * @param Request  $request  Request data.
     * @param Response $response Response data.
     */
    public function __construct($message, $code, Request $request, Response $response)
    {
        parent::__construct($message, $code);
        $this->request  = $request;
        $this->response = $response;
    }
    /**
     * Get request data.
     *
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }
    /**
     * Get response data.
     *
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}