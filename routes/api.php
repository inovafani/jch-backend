<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController as ApiPostController;

Route::get('/posts', [ApiPostController::class, 'index']);
Route::get('/posts/{id}', [ApiPostController::class, 'show']);