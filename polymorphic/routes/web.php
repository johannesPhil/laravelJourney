<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PostController;


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



Route::get('/create/product',[ProductController::class,'create']);


Route::get('/create/staff',[StaffController::class,'create']);

Route::get('/create/photo/{staff_id}',[PhotoController::class,'createPhoto']);

Route::get('/create/tag',[TagController::class,'createTag']);

Route::get('/create/video',[VideoController::class,'createVideo']);

Route::get('/create/post',[PostController::class,'createPost']);

Route::get('/read/{id}',[PhotoController::class,'readPhoto']);

Route::get('/read/post/{id}', [PostController::class, 'readPost']);

Route::get('/update/{id}',[PhotoController::class,'updatePhoto']);

Route::get('/update/post/{id}',[PostController::class,'updatePost']);

Route::get('/delete/{id}',[PhotoController::class,'deletePhoto']);
