<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;

Route::get('/', function () {
    return redirect()->route('admin.posts.index');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('posts', PostController::class);
});

Route::view('/create','create')->middleware('auth');