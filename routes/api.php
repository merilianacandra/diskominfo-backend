<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

Route::get('/', function() {
    return view('welcome');
});

Route::get('/book', [BookController::class, 'index']);
Route::post('/book', [BookController::class, 'store'])->name('post.store');
Route::put('/book/{book}', [BookController::class, 'update']);
Route::delete('/book/{book}', [BookController::class, 'destroy'])->name('posts.destroy');
Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('book/{book}', [BookController::class, 'updateStatus']);

Route::get('/user', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'store']);