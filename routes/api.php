<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace' => 'App\Http\Controllers',
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::group(['namespace' => 'App\Http\Controllers\Api', 'prefix' => 'admin'], function () {

    Route::group(['namespace' => 'Movie', 'prefix' => 'movie'], function () {
        Route::get('/',IndexController::class);
        Route::get('/{movie}',ShowController::class);
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'category'], function () {
        Route::get('/',IndexController::class);
        Route::get('/{category}',ShowController::class);
    });

});
