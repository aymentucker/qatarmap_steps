<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PropertiesController;

use App\Http\Controllers\Api\AdSliderController;

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

Route::get('/hello', function () {
    return "Hello World!";
  });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('properties', PropertiesController::class);


Route::get('/properties/filter', [PropertiesController::class, 'filter']);

// // // Place this in routes/api.php for API routes
Route::get('/properties/search', [PropertiesController::class, 'search']);


Route::get('/properties/{property}/comments', [PropertiesController::class, 'comment']);



Route::get('/properties/category/{category}', [PropertiesController::class, 'getPropertiesByCategory']);


Route::get('/ad-sliders', [AdSliderController::class, 'showSliders']);
