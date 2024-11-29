<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyNewController;
use App\Http\Controllers\PostController;

Route::get('/page1', [MyNewController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);