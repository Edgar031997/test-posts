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


Route::get('/', [\App\Http\Controllers\PostController::class,'posts'])->name('posts');
Route::get('/post/{slug}', [\App\Http\Controllers\PostController::class,'post'])->name('post');
Route::get('/new/post/create', [\App\Http\Controllers\PostController::class,'postCreatePage'])->name('post.create.page');
Route::post('/post/create', [\App\Http\Controllers\PostController::class,'postCreate'])->name('post.create');
Route::post('/post/comment', [\App\Http\Controllers\PostController::class,'postComment'])->name('post.comment');

Route::get('/author/{ip}', [\App\Http\Controllers\AuthorController::class,'author'])->name('author');
