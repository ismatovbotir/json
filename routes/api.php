<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdinesController;
use App\Http\Controllers\Api\TasnifController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'adines/hs', 'middleware' => 'adines.auth'], function () {
    Route::get('/auth', [AdinesController::class, 'auth']);
    Route::resource('/product', AdinesController::class);
});
Route::group(['prefix' => 'cl-api',], function () {
    Route::get('/integration-mxik/get/all/history/time', [TasnifController::class, 'AllHistoryTime']);
    Route::get('/integration-mxik/get/information', [TasnifController::class, 'Information']);
    Route::get('/integration-mxik/get/history/time', [TasnifController::class, 'HistoryTime']);
    Route::get('/integration-mxik/get/all/history/time-json', [TasnifController::class, 'AllHistoryTimeJson']);
});
