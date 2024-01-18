<?php

use App\Http\Controllers\Api\CarBrandController;
use App\Http\Controllers\Api\CarModelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/car-models', [CarModelController::class, 'index']);
Route::get('/car-models/{id}', [CarModelController::class, 'show']);


Route::get('/car-brands', [CarBrandController::class, 'index']);
Route::get('/car-brands/{id}', [CarBrandController::class, 'show']);
