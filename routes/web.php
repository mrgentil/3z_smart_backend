<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\USerController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CarteMenuController;
use App\Http\Controllers\CategorieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('layouts.main');
}); */

Auth::routes();
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\USerController::class);
    Route::resource('categories', App\Http\Controllers\CategorieController::class);
    Route::resource('products', App\Http\Controllers\ProductController::class);
    Route::resource('espaces-tables', App\Http\Controllers\TableController::class);
    Route::resource('menus', App\Http\Controllers\CarteMenuController::class);
    Route::resource('commandes', App\Http\Controllers\CommandeController::class);
});
