<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModelController;

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

Route::get('/users',[ModelController::class,'index'])->name('user.index');
Route::get('/createuser',[ModelController::class,'create'])->name('user.create');
Route::post('/user',[ModelController::class,'store'])->name('user.store');
Route::get('/user/edit/{id}',[ModelController::class,'edit'])->name('user.edit');
Route::post('/user/update/{id}',[ModelController::class,'update'])->name('user.update');
Route::get('/user/delete/{id}',[ModelController::class,'destroy'])->name('user.destroy');

Route::get('/create-distance',[ModelController::class,'distance'])->name('user.distance');

Route::post('/calculate',[ModelController::class,'calculateDistance']);