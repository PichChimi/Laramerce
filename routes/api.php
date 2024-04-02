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
Route::post('/auth/login', [App\Http\Controllers\Api\LoinAPIController::class, 'login']);

Route::group([
    'prefix' => 'categories',
    // 'middleware' => ['auth:sanctum']
], function(){
    Route::get('/', [App\Http\Controllers\Api\ControllerAPICategory::class, 'index']);
    Route::get('/{category}', [App\Http\Controllers\Api\ControllerAPICategory::class, 'home']);
    Route::post('/', [App\Http\Controllers\Api\ControllerAPICategory::class, 'store']);
    Route::put('/{category}', [App\Http\Controllers\Api\ControllerAPICategory::class, 'update']);
    Route::delete('/{category}', [App\Http\Controllers\Api\ControllerAPICategory::class, 'destroy']);
});

Route::group([
    'prefix' => 'products',
    // 'middleware' => ['auth:sanctum']
], function(){
    Route::get('/', [App\Http\Controllers\Api\ProductAPICategory::class, 'index']);
    Route::post('/', [App\Http\Controllers\Api\ProductAPICategory::class, 'store']);
    Route::put('/{product}', [App\Http\Controllers\Api\ProductAPICategory::class, 'update']);
    Route::delete('/{product}', [App\Http\Controllers\Api\ProductAPICategory::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

