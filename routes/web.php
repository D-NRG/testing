<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\MaController;
use App\Http\Controllers\ManufactureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SizeController;
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
//Route::get('register',[RegisterController::class,'create']);
//Route::post('register',[RegisterController::class,'store']);
//Route::post('logout',[SessionController::class,'destroy'])->middleware('auth');
//Route::get('login',[SessionController::class,'create']);
//Route::post('login',[SessionController::class,'store']);
//Route::prefix('categories')->as('categories')->group(function () {
//    Route::get('', [CategoriesController::class, 'index']);
//    Route::get('create', [CategoriesController::class, 'create'])->name('create')->middleware('auth');;
//    Route::post('', [CategoriesController::class, 'store'])->name('store')->middleware('auth');;
//    Route::get('{categories}', [CategoriesController::class, 'show'])->name('show');
//    Route::get('{categories}/edit', [CategoriesController::class, 'edit'])->name('edit')->middleware('auth');;
//    Route::post('edit', [CategoriesController::class, 'editStore'])->name('editStore')->middleware('auth');;
////    Route::put('{category}', [CategoriesController::class, 'update'])->name('category.update');
//    Route::delete('{categories}', [CategoriesController::class, 'delete'])->name('.delete')->middleware('auth');;
//});
//Route::prefix('color')->as('color')->group(function (){
//    Route::get('', [ColorController::class, 'index']);
//    Route::get('create', [ColorController::class, 'create'])->name('create')->middleware('auth');;
//    Route::post('', [ColorController::class, 'store'])->name('store')->middleware('auth');;
//    Route::get('{color}', [ColorController::class, 'show'])->name('show');
//    Route::get('{color}/edit', [ColorController::class, 'edit'])->name('edit');
//    Route::post('edit', [ColorController::class, 'editStore'])->name('editStore')->middleware('auth');;
////    Route::put('{category}', [ColorController::class, 'update'])->name('update');
//    Route::delete('{color}', [ColorController::class, 'delete'])->name('delete')->middleware('auth');;
//});
//Route::prefix('manufacture')->as('manufacture')->group(function (){
////    Route::get('', [ManufactureController::class, 'index']);
//    Route::post('', [ManufactureController::class, 'store']);
//    Route::get('{manufacture}', [ManufactureController::class, 'show']);
//    Route::get('{manufacture}/edit', [ManufactureController::class, 'edit'])->middleware('auth');
//    Route::put('{manufacture}', [ManufactureController::class, 'update']);
//    Route::delete('{manufacture}', [ManufactureController::class, 'destroy'])->middleware('auth');
//});
//Route::prefix('size')->as('size')->group(function (){
//    Route::get('', [SizeController::class, 'index']);
//    Route::get('create', [SizeController::class, 'create'])->name('create')->middleware('auth');;
//    Route::post('', [SizeController::class, 'store'])->name('store')->middleware('auth');;
//    Route::get('{size}', [SizeController::class, 'show'])->name('show');
//    Route::get('{size}/edit', [SizeController::class, 'edit'])->name('edit')->middleware('auth');;
//    Route::post('edit', [SizeController::class, 'editStore'])->name('editStore')->middleware('auth');;
////    Route::put('{category}', [ColorController::class, 'update'])->name('update');
//    Route::delete('{size}', [SizeController::class, 'delete'])->name('delete')->middleware('auth');;
//});
//Route::prefix('product')->as('product')->group(function (){
//    Route::get('', [ProductController::class, 'index']);
//    Route::get('create', [ProductController::class, 'create'])->name('create')->middleware('auth');;
//    Route::post('', [ProductController::class, 'store'])->name('store')->middleware('auth');;
//    Route::get('{product}', [ProductController::class, 'show'])->name('show');
//    Route::get('{product}/edit', [ProductController::class, 'edit'])->name('edit')->middleware('auth');;
//    Route::post('edit', [Productcontroller::class, 'editStore'])->name('editStore')->middleware('auth');;
////    Route::put('{category}', [ColorController::class, 'update'])->name('update');
//    Route::delete('{product}', [ProductController::class, 'delete'])->name('delete')->middleware('auth');;
//});

//Route::group([
//    'as' => 'passport.',
//    'prefix' => config('passport.path', 'oauth'),
//    'namespace' => '\Laravel\Passport\Http\Controllers',
//], function () {
//});
