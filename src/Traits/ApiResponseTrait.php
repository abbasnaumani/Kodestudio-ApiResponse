<?php

namespace Kodestudio\ApiResponse\Traits;

use Kodestudio\ApiResponse\Facades\ApiResponseFacade;

trait ApiResponseTrait
{

    public function setApiSuccessMessage($msg, $payload = null, $statusCode = 200)
    {
        ApiResponseFacade::setStatus(config('apiresponse.success_response'));
        ApiResponseFacade::setMessage($msg);
        ApiResponseFacade::setPayload($payload);
        ApiResponseFacade::setCode($statusCode);
    }

    public function setApiErrorMessage($msg, $payload = null, $statusCode = 400)
    {
        ApiResponseFacade::setMessage($msg);
        ApiResponseFacade::setPayload($payload);
        ApiResponseFacade::setCode($statusCode);
    }

    public function getResponse()
    {
        return ApiResponseFacade::getResponse();
    }

    public function getApiResponse()
    {
        return ApiResponseFacade::getApiResponse();
    }

    private function extractErrorMessage($exceptionErrors)
    {
        if (isset($exceptionErrors) && is_array($exceptionErrors) && count($exceptionErrors) > 0) {
            foreach ($exceptionErrors as $error) {
                return $this->extractErrorMessage($error);
            }
        } else {
            return $exceptionErrors;
        }
    }
}
