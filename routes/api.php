<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\checkAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/posts/{post}', [PostController::class, 'show']);
    Route::post('/post', [PostController::class, 'create'])->middleware(checkAdmin::class);
    Route::put('/posts/{post}',[PostController::class,'update'])->middleware(checkAdmin::class);
    Route::delete('/posts/{post}',[PostController::class,'delete'])->middleware(checkAdmin::class);

});

Route::post('/register',[UserController::class,'register']);
Route::post('/login', [UserController::class, 'login']);


