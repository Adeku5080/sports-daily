<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
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


Route::get('/' ,HomeController::class)->name('home');

Route::get('/post',[PostController::class,'create'])->name('create');
Route::post('/post/store',[PostController::class, 'store'])->name('store');
Route::get('/show/{post}',[PostController::class, 'show'])->name('show');
Route::get('/edit/{post}',[PostController::class, 'edit'])->name('edit');
Route::put('/update/{post}',[PostController::class, 'update'])->name('update');
Route::delete('/delete/{post}',[PostController::class,'delete'])->name('delete');
Route::post('/show/comments/{post}',[PostCommentController::class,'storeComment'])->name('create-comment');
require __DIR__.'/auth.php';

