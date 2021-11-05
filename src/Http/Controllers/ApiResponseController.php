<?php

namespace Kodestudio\ApiResponse\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ApiResponseController extends Controller
{
    /**
     * Api Response Page View
     *
     */
    public function index()
    {
        return $this->getApiResponse();
        //return view('apiresponse::apiresponse');
    }

}
