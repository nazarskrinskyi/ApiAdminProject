<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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


Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', IndexController::class)->name('home');
});



Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::get('/', IndexController::class)->name('admin.index');

    Route::group(['namespace' => 'Movie'], function () {
        Route::get('/movie', IndexController::class)->name('admin.movie.index');
        Route::patch('/movie/{movie}', UpdateController::class)->name('admin.movie.update');
        Route::delete('/movie/{movie}', DeleteController::class)->name('admin.movie.delete');
        Route::get('/movie', IndexController::class)->name('admin.movie.index');
        Route::post('/movie', StoreController::class)->name('admin.movie.store');
        Route::get('/movie/create', CreateController::class)->name('admin.movie.create');
        Route::get('/movie/{movie}', ShowController::class)->name('admin.movie.show');
        Route::get('/movie/{movie}/edit', EditController::class)->name('admin.movie.edit');
    });

    Route::group(['namespace' => 'Category'], function () {
        Route::patch('/category/{category}', UpdateController::class)->name('admin.category.update');
        Route::delete('/category/{category}', DeleteController::class)->name('admin.category.delete');
        Route::get('/category', IndexController::class)->name('admin.category.index');
        Route::get('/category/create', CreateController::class)->name('admin.category.create');
        Route::get('/category/{category}/edit', EditController::class)->name('admin.category.edit');
        Route::get('/category/{category}', ShowController::class)->name('admin.category.show');
        Route::post('/category', StoreController::class)->name('admin.category.store');
    });
});

//Auth::routes(['verify' => true]);

