<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\UploadController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Frontend\FrontController;

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [BackendController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('posts', PostController::class);
    Route::resource('uploads', UploadController::class);
//    Route::get('/users', function () {
//        // Matches The "/admin/users" URL
//    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});




Auth::routes([
    'register' => false,
    'verify' => true,
    'reset' => false
]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [FrontController::class, 'index'])->name('home');

Route::prefix('posts')->group(function () {
    Route::name('posts.display')->get('{slug}', [FrontController::class, 'show']);

});
