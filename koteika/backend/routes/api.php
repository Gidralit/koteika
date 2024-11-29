<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeaderController;

Route::get('/headers', [HeaderController::class, 'index']);

Route::get('/tests', function () {
    return response()->json(['message' => 'api is working']);
});