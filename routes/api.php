<?php

use App\Http\Controllers\SilverController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/silvers', [SilverController::class, 'index']);
Route::post('/silver-store', [SilverController::class, 'store']);
Route::get('/silvers/{id}', [SilverController::class, 'show']);
Route::put('/silvers/{id}', [SilverController::class, 'update']);
Route::delete('/silvers/{id}', [SilverController::class, 'destroy']);
