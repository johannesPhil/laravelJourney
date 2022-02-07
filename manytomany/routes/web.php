<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Role;
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


Route::get('/createUser', [UserController::class,'createRandom']);

Route::get('/createRole/{user_id}',[RoleController::class,'create']);

Route::get('/read/{user_id}', [RoleController::class,'read']);

Route::get('/update/{user_id}',[RoleController::class,'update']);

Route::get('/delete/{user_id}', [RoleController::class,'delete']);

Route::get('attach/{user_id}', [RoleController::class, 'attach']);

Route::get('/detach/{user_id}', [RoleController::class, 'detach']);