<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::any('/{any?}', function (Request $request, ?string $any = null) {
    return response()->json([
        'method' => $request->method(),
        'path' => $any ?? '/',
        'parameters' => $request->all(),
    ]);
})->where('any', '.*');
