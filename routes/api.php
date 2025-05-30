<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LocationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["middleware" => "api",
               "prefix" => "auth"
], function(){
    Route::get('/employee', [EmployeeController::class,"displayData"]);
    // Route::get('/location', [LocationController::class,"displayLocationTable"]);
    Route::post('/add-location',[LocationController::class,"addLocation"]);

    Route::put("/update-location/{id}",[LocationController::class,"updateLocation"]);
    
});

Route::group(["middleware" => "api",
               "prefix" => "admin"
], function(){
    Route::get('/location', [LocationController::class,"displayLocationTable"]);
    Route::delete("/delete-data/{id}",[LocationController::class,"deleteLocation"]);
   
});

