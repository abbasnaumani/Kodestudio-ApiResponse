# Api Response Helper Functions

> This will provide Helper functions in laravel for API singleton approach to get responses
## About
The goal of this package is to provide you with a set of most common Responses that may be needed while developing JSON REST API. It also:
* Handles exceptions output.
* Singleton API response so single source of truth to get API responses 

## Installation
Created for Laravel 8, most probably will work for the older versions too by few tweaks if required.

```php
composer require kodestudio/apiresponse
```
Add in providers array config/app.php before RouteServiceProvider
```php
Kodestudio\ApiResponse\ApiResponseServiceProvider::class
```
Execute this to get configuration file at config/apiresponse.php 
```php
php artisan vendor:publish --tag=apiresponse-config
```
### Example:
Use ApiResponseTrait, where you want to use API responses

```
use ApiResponseTrait;
```
### Sample Integration Code:
```
<?php

namespace App\Services\BaseService;

use Kodestudio\ApiResponse\Traits\ApiResponseTrait;

class BaseService
{
    use ApiResponseTrait;
    
    /**
     * Method to Get User By Id
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function getUserById(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $this->setApiSuccessMessage("User Found Successfully", $user); // if you got success response you will set success message

        } else {
            $this->setApiErrorMessage("User Not Found", , $user); // if you got error response you have to set error message
        }
        return $this->getApiResponse(); // here you will get the response that you have set .
    }

}

```

### Handler

Replace Register method your default exceptions handler as below or update whole file: 

```
<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Kodestudio\ApiResponse\Traits\ApiResponseTrait;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponseTrait;

    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $errorMessage = 'Something went wrong.';

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */

    public function register()
    {
     $this->renderable(function (Throwable $e) {
            if ($e instanceof TransferException) {
                return response()->json(['Error' => 'Unable to retrieve a list of customer ship addresses.'], $e->getCode());
            }
            if ($e instanceof ValidationException) {
                $this->setApiErrorMessage($this->extractErrorMessage($e->errors()), ['errors' => $this->traceErrors($e)]);
            } elseif ($e instanceof AuthenticationException) {
                $this->setApiErrorMessage($e->getMessage(), ['errors' => $this->traceErrors($e)],401);
            } elseif ($e instanceof \Illuminate\Http\Exceptions\PostTooLargeException) {
                $this->setApiErrorMessage("Post Size is too large.", ['errors' => $this->traceErrors($e)], $e->getStatusCode());
            } elseif ($e instanceof ModelNotFoundException) {
                $this->setApiErrorMessage("Modal Not Found", ['errors' => $this->traceErrors($e)]);
            } elseif ($e instanceof MediaUploadException) {
                $this->setApiErrorMessage($e->getMessage(), ['errors' => $this->traceErrors($e)]);
            } else {
                $this->setApiErrorMessage($e->getMessage(), ['errors' => $this->traceErrors($e)]);
            }
            return $this->getApiResponse();
        });
    }

}
```
#### Note: This is purely created for Json API response so need to update if required html response, we can use this check whenever required $request->expectsJson(), Thanks
