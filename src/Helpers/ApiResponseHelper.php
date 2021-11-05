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

    public static function setStatus($status)
    {
        $apiHelper = app(ApiResponseHelper::class);
        $apiHelper->status = $status;
    }

    public static function getStatus()
    {
        $apiHelper = app(ApiResponseHelper::class);
        return $apiHelper->status;
    }

    public static function setCode($code)
    {
        $apiHelper = app(ApiResponseHelper::class);
        $apiHelper->code = $code;
    }

    public static function getCode()
    {
        $apiHelper = app(ApiResponseHelper::class);
        return $apiHelper->code;
    }

    public static function setMessage($message)
    {
        $apiHelper = app(ApiResponseHelper::class);
        $apiHelper->message = $message;
    }

    public static function getMessage()
    {
        $apiHelper = app(ApiResponseHelper::class);
        return $apiHelper->message;
    }

    public static function setData($data)
    {
        $apiHelper = app(ApiResponseHelper::class);
        $apiHelper->data = $data;
    }

    public static function getData()
    {
        $apiHelper = app(ApiResponseHelper::class);
        return $apiHelper->data;
    }

    public static function setResponseFormat($responseFormat)
    {
        $apiHelper = app(ApiResponseHelper::class);
        $apiHelper->responseFormat = $responseFormat;
    }

    public static function getResponseFormat()
    {
        $apiHelper = app(ApiResponseHelper::class);
        return $apiHelper->responseFormat;
    }

    public static function getResponse()
    {
        return app(ApiResponseHelper::class);
    }

    public static function getApiResponse()
    {
        $apiHelper = app(ApiResponseHelper::class);
        if ($apiHelper->responseFormat == config('apiresponse.response_format')) {
            return response()->json($apiHelper, $apiHelper->code);
        }
        dd($apiHelper);
        return $apiHelper;
    }
}
