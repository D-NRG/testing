<?php

use App\Http\Controllers\AttrController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ManufactureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
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

//Route::apiResources([
//    '/manufacture'=>ManufactureController::class,
//    '/size'=>SizeController::class,
//    '/color'=>ColorController::class,
//    '/product'=>ProductController::class,
//    '/categories'=>CategoriesController::class,
//    '/attr'=>AttrController::class,
//]);
Route::controller(\App\Http\Controllers\RegisterController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});
Route::controller(ColorController::class)->group(function () {
    Route::get('/color', 'index');
    Route::get('/color/{id}', 'show');
});
Route::controller(SizeController::class)->group(function () {
    Route::get('/size', 'index');
    Route::get('/size/{id}', 'show');
});
Route::controller(ManufactureController::class)->group(function () {
    Route::get('/manufacture', 'index');
    Route::get('/manufacture/{id}', 'show');
});
Route::controller(CategoriesController::class)->group(function () {
    Route::get('/categories', 'index');
    Route::get('/caregories/{id}', 'show');
});
Route::controller(ProductController::class)->group(function () {
    Route::get('/product', 'index');
    Route::get('/product/{id}', 'show');
});
Route::controller(AttrController::class)->group(function () {
    Route::get('/attr', 'index');
    Route::get('/attr/{id}', 'show');
});

Route::middleware('auth:api')->group(function (){
    Route::post('/logout',[\App\Http\Controllers\RegisterController::class,'logout']);

    Route::controller(ColorController::class)->group(function () {
        Route::post('/color', 'store');
        Route::delete('/color/{id}', 'destroy');
        Route::put('/color/{id}', 'update');
    });
    Route::controller(SizeController::class)->group(function () {
        Route::post('/size', 'store');
        Route::delete('/size/{id}', 'destroy');
        Route::put('/size/{id}', 'update');
    });
    Route::controller(ManufactureController::class)->group(function () {
        Route::post('/manufacture', 'store');
        Route::delete('/manufacture/{id}', 'destroy');
        Route::put('/manufacture/{id}', 'update');
    });
    Route::controller(CategoriesController::class)->group(function () {
        Route::post('/categories', 'store');
        Route::delete('/caregories/{id}', 'destroy');
        Route::put('/caregories/{id}', 'update');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::post('/product', 'store');
        Route::delete('/product/{id}', 'destroy');
        Route::put('/product/{id}', 'update');
    });
    Route::controller(AttrController::class)->group(function () {
        Route::post('/attr', 'store');
        Route::delete('/attr/{id}', 'destroy');
        Route::put('/attr/{id}', 'update');
    });
});
