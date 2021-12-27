<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\USerController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CarteMenuController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AjoutTableController;
use App\Http\Controllers\NotiificationController;

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
    Route::resource('notifications', App\Http\Controllers\NotiificationController::class);
    Route::resource('tables', App\Http\Controllers\AjoutTableController::class);
    Route::get('/validations', [App\Http\Controllers\CommandeController::class, 'validations'])->name('validation');
    Route::get('/validations/{table_id}', [App\Http\Controllers\CommandeController::class, 'validationsShow'])->name('validation.show');
    Route::get('/commande_tamp/change-state/{commande_id}', [App\Http\Controllers\CommandeController::class, 'ChangeState'])->name('change');
    Route::get('/facturer/{table_id}', [App\Http\Controllers\FactureController::class, 'facture'])->name('facture');
    Route::get('/factures', [App\Http\Controllers\FactureController::class, 'index'])->name('facture.index');
    Route::get('/factures-edit', [App\Http\Controllers\FactureController::class, 'edit'])->name('facture.edit');
    Route::get('/factures/commande/{id}', [App\Http\Controllers\FactureController::class, 'show'])->name('facture.show');
    Route::delete('/factures/{id}', [App\Http\Controllers\FactureController::class, 'delete'])->name('facture.delete');
    Route::get('stock', [App\Http\Controllers\StockController::class, 'index'])->name('stock');
});
