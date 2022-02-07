<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create/user', [UserController::class, 'createRandom']);

Route::get('/create/post', [PostsController::class,'create']);

Route::get('/read/{user_id}', [PostsController::class,'read']);

Route::get('update/{id}', [PostsController::class,'update']);

Route::get('/delete/{id}', [PostsController::class, 'delete']);

