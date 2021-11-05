<?php

namespace Kodestudio\ApiResponse\Facades;

use Illuminate\Support\Facades\Facade;

class ApiResponseFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {

        return 'api.response';
    }
}
