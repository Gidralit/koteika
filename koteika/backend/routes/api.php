<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;

Route::get('/headers', [HeaderController::class, 'index']);
Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/rooms', [RoomController::class, 'index']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/tests', function () {
    return response()->json(['message' => 'api is working']);
});