<?php

namespace Kodestudio\ApiResponse\Traits;

use Kodestudio\ApiResponse\Facades\ApiResponseFacade;

trait ApiResponse
{

    public function setApiSuccessMessage($msg, $data = null, $statusCode = 200)
    {
        ApiResponseFacade::setStatus(config('apiresponse.success_response'));
        ApiResponseFacade::setMessage($msg);
        ApiResponseFacade::setData($data);
        ApiResponseFacade::setCode($statusCode);
    }

    public function setApiErrorMessage($msg, $data = null, $statusCode = 400)
    {
        ApiResponseFacade::setMessage($msg);
        ApiResponseFacade::setData($data);
        ApiResponseFacade::setCode($statusCode);
    }

    public function response()
    {
        return ApiResponseFacade::getResponse();
    }

    public function getApiResponse()
    {
        return ApiResponseFacade::getApiResponse();
    }
}
