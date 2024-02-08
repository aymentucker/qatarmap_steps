<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PropertiesController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\AdSliderController;
use App\Http\Controllers\Api\UsersController;


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


Route::get('/filter', [PropertiesController::class, 'filter']);

// // // Place this in routes/api.php for API routes
Route::get('/properties/search', [PropertiesController::class, 'search']);

Route::get('/search', [PropertiesController::class, 'search']);



// Route::get('/properties/{property}/comments', [PropertiesController::class, 'comment']);

Route::get('/properties/{propertyId}/similar', [PropertiesController::class, 'getSimilarProperties']);


// routes/api.php
// Route::post('/properties/{property}/comments', [CommentController::class, 'store'])->middleware('auth:api');

// Route::post('/properties/{property}/comments', [PropertiesController::class, 'storeComment'])->middleware('auth:api');



Route::post('properties/{property}/comments', [PropertiesController::class, 'addComment']);


Route::get('/properties/category/{categoryId}', [PropertiesController::class, 'getPropertiesByCategory']);


Route::get('/ad-sliders', [AdSliderController::class, 'showSliders']);

/// get cities and regions of city
Route::get('/cities', [PropertiesController::class, 'getCities']);

Route::get('/regions/{cityName}', [PropertiesController::class, 'getRegionsForCity']);

/// * Fetch all cities with their regions and latlng.

Route::get('/allcities', [PropertiesController::class, 'getallCities']);

Route::get('/allregions', [PropertiesController::class, 'getallRegions']);



/// get  all categories 
Route::get('/categories', [PropertiesController::class, 'getcategories']);


Route::post('/properties/{id}/count-view', [PropertiesController::class, 'countView']);


// Route to get the list of user's favorite properties
Route::get('/favorites', [PropertiesController::class, 'getFavoriteIndex'])
    ->middleware('auth:api');

// Route to store a new favorite property
Route::post('/favorites', [PropertiesController::class, 'getFavoriteStore'])
    ->middleware('auth:api');

// Route to delete a favorite property
Route::delete('/favorites/{id}', [PropertiesController::class, 'getFavoriteDestroy'])
    ->middleware('auth:api');


Route::post('/login', [UsersController::class, 'login']);


Route::get('/properties/city/{cityName}', [PropertiesController::class, 'fetchPropertiesForCity']);
Route::get('/properties/region/{regionName}', [PropertiesController::class, 'fetchPropertiesForRegion']);


