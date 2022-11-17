<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    Route::controller(\App\Http\Controllers\PostController::class)->prefix('posts')->group(function () {
        Route::get('/', 'index')->name('posts.index');
        Route::get('/create', 'create')->name('posts.create');
        Route::post('/store', 'store')->name('posts.store');
        Route::get('/show/{show}', 'show')->name('posts.show');
    });
    Route::controller(\App\Http\Controllers\CommentController::class)->prefix('comments')->group(function () {
        Route::post('/store', 'store')->name('comments.store');

    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
