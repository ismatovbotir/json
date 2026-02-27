<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdinesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'adines/hs'], function () {
    Route::post('/auth', [AdinesController::class, 'auth']);
    Route::resource('/product', AdinesController::class);
});
