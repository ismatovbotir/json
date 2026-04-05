<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdinesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'adines/hs', 'middleware' => 'adines.auth'], function () {
    Route::get('/auth', [AdinesController::class, 'auth']);
    Route::resource('/product', AdinesController::class);
});
Route::group(['prefix' => 'cl-api',], function () {
    Route::get('/{any?}', function (Request $request, ?string $any = null) {
        return response()->json([
            'path' => $any ?? '',
            'parameters' => $request->query(),
        ]);
    })->where('any', '.*');
});
