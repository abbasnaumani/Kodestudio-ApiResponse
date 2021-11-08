# Api Response Helper Functions

> This will provide Helper functions in laravel for API singleton approach to get responses
## About
The goal of this package is to provide you with a set of most common Responses that may be needed while developing JSON REST API. It also:
* Handles exceptions output.
* Singleton API response so single source of truth to get API responses 

## Installation
Create For Laravel 8, most probably will work for the older versions too by few tweaks if required.

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


### Handler

Replace Register method your default exceptions handler with: 

```

   public function register()
    {
        $this->renderable(function (Throwable $e) {
            if ($e instanceof ValidationException) {
                $this->setApiErrorMessage($this->extractErrorMessage($e->errors()), ['errors' => [
                    'getPrevious' => $e->getPrevious(),
                    'getMessage' => $e->getMessage(),
                    'getCode' => $e->getCode(),
                    'getFile' => $e->getFile(),
                    'getLine' => $e->getLine(),
                    'getTrace' => $e->getTrace()
                ]]);
                return $this->getApiResponse();
            }
            $this->setApiErrorMessage($e->getMessage(), ['errors' => [
                'getPrevious' => $e->getPrevious(),
                'getMessage' => $e->getMessage(),
                'getCode' => $e->getCode(),
                'getFile' => $e->getFile(),
                'getLine' => $e->getLine(),
                'getTrace' => $e->getTrace()
            ]]);
            return $this->getApiResponse();
        });
    }
```
#### Note: This is purely created for Json API response so need to update if required html response, we can use this check whenever required $request->expectsJson(), Thanks
