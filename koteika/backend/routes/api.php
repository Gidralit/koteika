<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoomController;

Route::get('/headers', [HeaderController::class, 'index']);
Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/tests', function () {
    return response()->json(['message' => 'api is working']);
});