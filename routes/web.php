<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\CommentController;
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

Route::get('/', [PostController::class,'index'])->name('home');

Route::post('/create-posts',[PostController::class,'createPost'])->name('create_post');


Route::get('/posts/{ id}', [PostController::class,'getPostById']);

Route::post('/get-comments/{id}',[CommentController::class,'store'])->name('get_comments');
