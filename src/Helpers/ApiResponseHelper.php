<?php

namespace Kodestudio\ApiResponse\Helpers;

class ApiResponseHelper
{
    public $status;
    public $message;
    private $code;
    public $data;
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
        //  $apiHelper = app(ApiResponseHelper::class);
        $this->status = $status;
    }

    public function getStatus()
    {
        //    $apiHelper = app(ApiResponseHelper::class);
        return $this->status;
    }

    public function setCode($code)
    {
        // $apiHelper = app(ApiResponseHelper::class);
        $this->code = $code;
    }

    public function getCode()
    {
        //$apiHelper = app(ApiResponseHelper::class);
        return $this->code;
    }

    public function setMessage($message)
    {
        //  $apiHelper = app(ApiResponseHelper::class);
        $this->message = $message;
    }

    public function getMessage()
    {
        /// $apiHelper = app(ApiResponseHelper::class);
        return $this->message;
    }

    public function setData($data)
    {
        // $apiHelper = app(ApiResponseHelper::class);
        $this->data = $data;
    }

    public function getData()
    {
        //   $apiHelper = app(ApiResponseHelper::class);
        return $this->data;
    }

    public function setResponseFormat($responseFormat)
    {
        // $apiHelper = app(ApiResponseHelper::class);
        $this->responseFormat = $responseFormat;
    }

    public function getResponseFormat()
    {
        // $apiHelper = app(ApiResponseHelper::class);
        return $this->responseFormat;
    }

    public function getResponse()
    {
        return $this;
    }

    public function getApiResponse()
    {
        //   $apiHelper = app(ApiResponseHelper::class);
        if ($this->responseFormat == config('apiresponse.response_format')) {
            return response()->json($this, $this->code);
        }
        return $this;
    }
}
