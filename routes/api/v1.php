<?php

use App\Http\Controllers\Api\V1\Products\IndexController;
use App\Http\Controllers\Api\V1\Products\ShowController;
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
})->name('auth.me');

/**
 * Product Routes
 */

 Route::prefix('products')->as('products.')->group(function() {
    Route::get('/', IndexController::class)->name('all');
    Route::get('/{product_key}', ShowController::class)->name('show');
 });
