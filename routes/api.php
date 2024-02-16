<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PropertiesController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\AdSliderController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\CompaniesController;


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
// Make sure to use the appropriate middleware for authentication, e.g., 'auth:sanctum'
Route::middleware('auth:sanctum')->get('/properties/current-user', [PropertiesController::class, 'fetchPropertiesForCurrentUser']);

// Define a POST route for property redeployment
Route::post('/properties/{propertyId}/redeploy', [PropertiesController::class, 'redeployProperty'])
     ->middleware('auth:sanctum'); // Ensure that the route is protected by Sanctum authentication

// Delete a property

Route::delete('/properties/{id}', [PropertiesController::class, 'destroy'])
     ->middleware('auth:sanctum'); // Assuming you are using Sanctum for API authentication

// Deleting Images for property

Route::delete('/properties/images/{imageName}', [PropertiesController::class, 'deleteImage']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('properties', PropertiesController::class);

Route::get('/properties/filter', [PropertiesController::class, 'filter']);


// // // Place this in routes/api.php for API routes
// Route::get('/properties/search', [PropertiesController::class, 'search']);

Route::get('/search', [PropertiesController::class, 'search']);

Route::get('/properties/{propertyId}/similar', [PropertiesController::class, 'getSimilarProperties']);


// routes/api.php
// Route::post('/properties/{property}/comments', [CommentController::class, 'store'])->middleware('auth:api');

// Route::post('/properties/{property}/comments', [PropertiesController::class, 'storeComment'])->middleware('auth:api');

// Route::get('/properties/{property}/comments', [PropertiesController::class, 'comment']);


/// get and post comments 

Route::post('properties/{property}/comments', [PropertiesController::class, 'addComment']);

Route::get('/properties/{property}/comments', [PropertiesController::class, 'comment']);



Route::get('/properties/category/{categoryId}', [PropertiesController::class, 'getPropertiesByCategory']);


Route::get('/ad-sliders', [AdSliderController::class, 'showSliders']);

/// get cities and regions of city
Route::get('/cities', [PropertiesController::class, 'getCities']);

Route::get('/regions/{cityName}', [PropertiesController::class, 'getRegionsForCity']);

/// * Fetch all cities with their regions and latlng.

Route::get('/allcities', [PropertiesController::class, 'getallCities']);

Route::get('/allregions', [PropertiesController::class, 'getallRegions']);

Route::get('/allregions', [PropertiesController::class, 'getallRegions']);

Route::get('/property-types', [PropertiesController::class, 'getPropertyTypes']);


Route::get('/furnishings', [PropertiesController::class, 'getFurnishings']);

Route::get('/ad-types', [PropertiesController::class, 'getAdTypes']);

Route::get('/companies/valuation', [CompaniesController::class, 'fetchValuationCompanies']);


// Route for fetching rent properties for a specific category
Route::get('/properties/rent/category/{categoryId}', [PropertiesController::class, 'fetchRentPropertiesForCategory']);

// Route for fetching sell properties for a specific category
Route::get('/properties/sell/category/{categoryId}', [PropertiesController::class, 'fetchSellPropertiesForCategory']);

Route::get('/getallcategories', [PropertiesController::class, 'getallCategories']);




/// get  all categories 
Route::get('/categories', [PropertiesController::class, 'getcategories']);


Route::post('/properties/{id}/count-view', [PropertiesController::class, 'countView']);


// // Route to get the list of user's favorite properties
// Route::get('/favorites', [PropertiesController::class, 'getFavoriteIndex'])
//     ->middleware('auth:api');

// // Route to store a new favorite property
// Route::post('/favorites', [PropertiesController::class, 'getFavoriteStore'])
//     ->middleware('auth:api');

// // Route to delete a favorite property
// Route::delete('/favorites/{id}', [PropertiesController::class, 'getFavoriteDestroy'])
//     ->middleware('auth:api');

// // Route checkIfFavorite property

// Route::get('/properties/{propertyId}/is-favorite', [PropertiesController::class,'isFavorite']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/properties', [PropertiesController::class,'store']);
    Route::get('favorites', [PropertiesController::class, 'getFavoriteIndex']);
    Route::post('favorites', [PropertiesController::class, 'getFavoriteStore']);
    Route::delete('favorites/{propertyId}', [PropertiesController::class, 'getFavoriteDestroy']);
    Route::get('properties/{propertyId}/is-favorite', [PropertiesController::class, 'isFavorite']);
});

Route::get('/companies', [CompaniesController::class, 'index']);
Route::get('/companies/{id}', [CompaniesController::class, 'show']);

Route::post('/follow/company/{companyId}', [CompaniesController::class, 'followCompany']);
Route::delete('/unfollow/company/{companyId}',  [CompaniesController::class,'unfollowCompany']);


// User registration
Route::post('/register', [UsersController::class, 'register']);

// User login
Route::post('/login', [UsersController::class, 'login']);


Route::get('/properties/city/{cityName}', [PropertiesController::class, 'fetchPropertiesForCity']);
Route::get('/properties/region/{regionName}', [PropertiesController::class, 'fetchPropertiesForRegion']);


Route::get('/properties/company/{companyId}', [PropertiesController::class, 'fetchPropertiesForCompany']);
Route::get('/rentproperties/company/{companyId}', [PropertiesController::class, 'fetchRentPropertiesForCompany']);




Route::post('/owners', [UsersController::class, 'storeOwner']);
Route::post('/managers', [UsersController::class, 'storeManager']);


// Route::post('/properties', [PropertiesController::class,'store'])->middleware('auth:api');
