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



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::namespace('App\Http\Controllers')->group(function(){
    Route::resource('/' , 'HomeController', ['only' => ['index']]);
});
Route::namespace('App\Http\Controllers\User')->group(function(){
    Route::resource('profile' , 'ProfileController', ['only' => ['show', 'edit', 'update']]);
});
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin-panel')->group(function(){
    Route::resource('/users' , 'UsersController', ['only' => ['index', 'edit', 'update', 'destroy']]);
});
Route::namespace('App\Http\Controllers\Group')->group(function(){
    Route::resource('group' , 'GroupsController', ['only' => ['create', 'show', 'edit', 'update']]);
});
