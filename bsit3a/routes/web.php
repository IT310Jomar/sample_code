<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LocationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get("/v1/locations",[EmployeeController::class,"index"]);
// Route::get('/v1/employments',[EmployeeController::class,"getEmployment"]);
// Route::get('/v1/test',[EmployeeController::class,"testFunction"]);
// Route::get('/login', [LoginController::class,"index"])->name('login');
// Route::get('/dashboard', [LoginController::class,"dashboard"]);
// Route::get('/dashboard/employee', [EmployeeController::class,"getEmployment"]);


// Route::get('/test',[EmployeeController::class,'testData']);
Route::get('/location',[LocationController::class,'displayLocation']);
