<?php

use App\Http\Controllers\AddressController;
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


/*
|--------------------------------------------------------------------------
| Data Insertion Routes
|--------------------------------------------------------------------------
|
| Insert data into the tables through routes instead of using raw sql statements
|
*/


Route::get('/insert/user', [UserController::class,'createRandom']);

Route::get('/insert/address', [AddressController::class, 'insert']);

Route::get('update/address', [AddressController::class, 'update']);

Route::get('/read/address', [AddressController::class,'read']);

Route::get('delete/address', [AddressController::class,'delete']);
