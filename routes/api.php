<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PropertyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\FavoriteController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


/*
|--------------------------------------------------------------------------
| Properties
|--------------------------------------------------------------------------
*/

Route::get('/properties', [PropertyController::class, 'index']);

Route::get('/properties/{id}', [PropertyController::class, 'show']);


Route::middleware('auth:sanctum')->group(function () {

    Route::post('/properties', [PropertyController::class, 'store']);

    Route::put('/properties/{id}', [PropertyController::class, 'update']);

    Route::delete('/properties/{id}', [PropertyController::class, 'destroy']);

});

/*
|--------------------------------------------------------------------------
| Cars
|--------------------------------------------------------------------------
*/

Route::get('/cars', [CarController::class, 'index']);

Route::get('/cars/{id}', [CarController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/cars', [CarController::class, 'store']);
    Route::put('/cars/{id}', [CarController::class, 'update']);
    Route::delete('/cars/{id}', [CarController::class, 'destroy']);


    Route::get('/favorites', [FavoriteController::class, 'index']);
Route::post('/favorites', [FavoriteController::class, 'store']);
Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy']);
});