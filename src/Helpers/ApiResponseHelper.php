<?php

namespace Kodestudio\ApiResponse\Helpers;

class ApiResponseHelper
{
    public $status;
    public $message;
    private $code;
    private $statusCode;
    public $payload;
    private $responseFormat;

    public function __construct()
    {
        $this->status = config('apiresponse.error_response');
        $this->message = config('apiresponse.error_message');
        $this->code = config('apiresponse.error_code');
        $this->responseFormat = config('apiresponse.response_format');
    }

    /**
     * Method to Set Status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Method to Get Status
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Method to Set Http Status Code
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * Method to Get Http Status Code
     *
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    /**
     * Method to Set Exception Code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Method to Get Exception Code
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Method to Set Message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Method to Get Message
     *
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Method to Set Payload
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;
    }

    /**
     * Method to Get Payload
     *
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * Method to Set Response Format
     */
    public function setResponseFormat($responseFormat)
    {
        $this->responseFormat = $responseFormat;
    }

    /**
     * Method to Get Response Format
     *
     * @return mixed
     */
    public function getResponseFormat()
    {
        return $this->responseFormat;
    }

    /**
     * Method to Get Response
     *
     * @return mixed
     */
    public function getResponse()
    {
        return $this;
    }

    /**
     * Method to Get API Response
     *
     * @return mixed
     */
    public function getApiResponse()
    {
        if ($this->responseFormat == config('apiresponse.response_format')) {
            return response()->json($this, $this->code);
        }
        return $this;
    }
}
