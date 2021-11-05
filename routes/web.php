<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Kodestudio\ApiResponse\Http\Controllers\ApiResponseController;

Route::get('apiresponse', [ApiResponseController::class, 'index'])->name('apiresponse');
