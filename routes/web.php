<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\TagController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('admin', 'backend.index');

Route::prefix('admin')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
//    Route::get('/users', function () {
//        // Matches The "/admin/users" URL
//    });
});

