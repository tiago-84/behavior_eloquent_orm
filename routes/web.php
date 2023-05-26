<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('posts/trashed', [PostController::class,'trashed'])->name('posts.trashed');
Route::get('posts/{post}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::delete('posts/{post}/forceDelete', [PostController::class, 'forceDelete'])->name('posts.forceDelete');
Route::resource('posts', PostController::class);
//Route::resource('posts/{id}/edit', PostController::class);

