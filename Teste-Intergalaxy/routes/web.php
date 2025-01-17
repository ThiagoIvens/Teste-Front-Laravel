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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 
    [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');

Route::get('users/{userId}',  
    [App\Http\Controllers\EditUserController::class, 'edit'])
    ->name('edit')
    ->where('userId', '[0-9]+')
    ->middleware('auth');

Route::put('users/update/{userId}',  
    [App\Http\Controllers\EditUserController::class, 'update'])
    ->name('update')
    ->where('userId', '[0-9]+')
    ->middleware('auth');