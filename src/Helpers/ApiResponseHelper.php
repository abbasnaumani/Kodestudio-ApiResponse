<?php

namespace Kodestudio\ApiResponse\Helpers;

class ApiResponseHelper
{
    public $status;
    public $message;
    private $code;
    public $payload;
    private $responseFormat;

    public function __construct()
    {
        $this->status = config('apiresponse.error_response');
        $this->message = config('apiresponse.error_message');
        $this->code = config('apiresponse.error_code');
        $this->responseFormat = config('apiresponse.response_format');
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setPayload($payload)
    {
        $this->payload = $payload;
    }

    public function getPayload()
    {
        return $this->payload;
    }

    public function setResponseFormat($responseFormat)
    {
        $this->responseFormat = $responseFormat;
    }

    public function getResponseFormat()
    {
        return $this->responseFormat;
    }

    public function getResponse()
    {
        return $this;
    }

    public function getApiResponse()
    {
        if ($this->responseFormat == config('apiresponse.response_format')) {
            return response()->json($this, $this->code);
        }
        return $this;
    }
}
