<?php

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

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/',[App\Http\Controllers\AdsController::class,'index']);

Route::name('users.')->prefix('users')->group(function (){
    Route::get('/',[App\Http\Controllers\UsersController::class,'index'])->name('index');
    Route::get('/create',[App\Http\Controllers\UsersController::class,'create'])->name('create');
    Route::post('/',[App\Http\Controllers\UsersController::class,'store'])->name('store');
    Route::get('/{id}',[App\Http\Controllers\UsersController::class,'show'])->name('show');
    Route::get('/{user}/edit',[App\Http\Controllers\UsersController::class,'edit'])->name('edit');
    Route::put('/{user}',[App\Http\Controllers\UsersController::class,'update'])->name('update');
    Route::delete('/{user}',[App\Http\Controllers\UsersController::class,'destroy'])->name('destroy');
});

Route::name('ads.')->prefix('ads')->group(function (){
    Route::get('/',[App\Http\Controllers\AdsController::class,'index'])->name('index');
    Route::get('/create',[App\Http\Controllers\AdsController::class,'create'])->name('create');
    Route::post('/',[App\Http\Controllers\AdsController::class,'store'])->name('store');
    Route::get('/{id}',[App\Http\Controllers\AdsController::class,'show'])->name('show');
    Route::get('/{ads}/edit',[App\Http\Controllers\AdsController::class,'edit'])->name('edit');
    Route::put('/{ads}',[App\Http\Controllers\AdsController::class,'update'])->name('update');
    Route::delete('/{ads}',[App\Http\Controllers\AdsController::class,'destroy'])->name('destroy');
});

Route::post('/login', [App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\AuthController::class,'logout'])->name('logout');

Route::get('/login/gitlab/callback', [App\Http\Controllers\GitlabController::class, 'callback'])
    ->middleware('guest');
