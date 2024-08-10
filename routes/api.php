<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\EmployeeController;
use App\Http\Controllers\Api\V1\CompanyController;
use App\Http\Controllers\Api\V1\WorkplaceController;
use App\Http\Controllers\Api\V1\PositionController;
use App\Http\Controllers\Api\V1\CountryController;

//Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
Route::prefix('v1')->group(function () {
    Route::apiResource('employees', EmployeeController::class);
    Route::apiResource('companies', CompanyController::class);
    Route::apiResource('workplaces', WorkplaceController::class);
    Route::apiResource('positions', PositionController::class);
    Route::apiResource('countries', CountryController::class);

    // Route::get('/user', function (Request $request) {
    //     return $request->user();
    // });
});


