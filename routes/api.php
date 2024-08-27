<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LocationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('products', ProductController::class);
Route::get('/provinces', [LocationController::class, 'getProvinces']);
Route::get('/cities/{provinceId}', [LocationController::class, 'getCities']);
Route::get('/districts/{regencyId}', [LocationController::class, 'getDistricts']);
Route::get('/villages/{districtId}', [LocationController::class, 'getVillages']);