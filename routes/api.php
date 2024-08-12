<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\EmployeeController;
use App\Http\Controllers\Api\V1\CompanyController;
use App\Http\Controllers\Api\V1\WorkplaceController;
use App\Http\Controllers\Api\V1\PositionController;
use App\Http\Controllers\Api\V1\CountryController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\AuthController;

const API_VERSION = '1.0.0';

Route::prefix('v1')->group(function () {
    Route::get('/', function () {
        return response()->json([
            'Name' => 'TK API',
            'Version' => API_VERSION
        ]);
    });

    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResources([
            'employees' => EmployeeController::class,
            'companies' => CompanyController::class,
            'workplaces' => WorkplaceController::class,
            'positions' => PositionController::class,
            'countries' => CountryController::class,
        ]);

        Route::resource('users', UserController::class);

        Route::controller(AuthController::class)->group(function () {
            Route::post('/logout', 'logout');
            Route::get('/me', 'me');
            Route::put('/me', 'updateProfile');
        });
    });
});
