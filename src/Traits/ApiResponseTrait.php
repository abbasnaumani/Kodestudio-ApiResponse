<?php

namespace Kodestudio\ApiResponse\Traits;

use Kodestudio\ApiResponse\Facades\ApiResponseFacade;

trait ApiResponseTrait
{
    /**
     * Method to Set Api Success Message
     */
    public function setApiSuccessMessage($msg, $payload = null, $statusCode = 200)
    {
        ApiResponseFacade::setStatus(config('apiresponse.success_response'));
        ApiResponseFacade::setMessage($msg);
        ApiResponseFacade::setPayload($payload);
        ApiResponseFacade::setStatusCode($statusCode);
    }

    /**
     * Method to Set Api Error Message
     */
    public function setApiErrorMessage($msg, $payload = null, $statusCode = 400)
    {
        ApiResponseFacade::setStatus(config('apiresponse.error_response'));
        ApiResponseFacade::setMessage($msg);
        ApiResponseFacade::setPayload($payload);
        ApiResponseFacade::setStatusCode($statusCode);
    }

    /**
     * Method to Get Http Status Code
     *
     * @return mixed
     */
    public function getStatusCode()
    {
        return ApiResponseFacade::getStatusCode();
    }

    /**
     * Method to Get Code
     *
     * @return mixed
     */
    public function getCode()
    {
        return ApiResponseFacade::getCode();
    }

    /**
     * Method to Get Response
     *
     * @return mixed
     */
    public function getResponse()
    {
        return ApiResponseFacade::getResponse();
    }

    /**
     * Method to Get Api Response
     *
     * @return mixed
     */
    public function getApiResponse()
    {
        return ApiResponseFacade::getApiResponse();
    }

    /**
     * Method to Get Api Error Message
     *
     * @return mixed
     */
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

    /**
     * Method to Get Api Response
     * @param $e
     * @return array
     */
    public function traceErrors($e): array
    {
        return [
            'getPrevious' => $e->getPrevious(),
            'getMessage' => $e->getMessage(),
            'getCode' => $e->getCode(),
            'getFile' => $e->getFile(),
            'getLine' => $e->getLine(),
            'getTrace' => $e->getTrace()
        ];
    }
}
