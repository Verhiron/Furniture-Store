<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\allItemController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\itemInsertController;


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


Route::get('/AllItems/{id}', [allItemController::class, 'getAllItems']);
Route::get('/items/{id}', [allItemController::class, 'items']);
Route::get('/', [allItemController::class, 'rooms']);
Route::get('/getItemCat/{id}', [allItemController::class, 'getItemCat']);
Route::post('/register', [RegistrationController::class, 'store']);
Route::post('/login', [RegistrationController::class, 'login']);
Route::get('/logout', [RegistrationController::class, 'logout']);
Route::post('/insert', [itemInsertController::class, 'insert']);

