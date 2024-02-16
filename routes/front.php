<?php

use App\Http\Controllers\Front\MainPageController;
use App\Http\Controllers\Front\PostController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Front'], function () {
    Route::get('/', [MainPageController::class, 'index'])->name('main');
    Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
});
