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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::namespace('App\Http\Controllers\User')->group(function(){
    Route::resource('profile' , 'ProfileController', ['only' => ['show', 'edit', 'update']]);
});
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin-panel')->group(function(){
    Route::resource('/users' , 'UsersController', ['only' => ['index', 'edit', 'update', 'destroy']]);
    Route::resource('/groups' , 'GroupsController', ['only' => ['index', 'edit', 'update', 'destroy']]);
});
Route::namespace('App\Http\Controllers\Group')->group(function(){
    Route::resource('group' , 'GroupsController', ['only' => ['create', 'show', 'edit', 'update', 'store']]);
});
Route::namespace('App\Http\Controllers\Group')->prefix('group/{group}')->name('group.')->group(function(){
    Route::resource('/members' , 'MembershipsController', ['only' => ['index','edit', 'update', 'destroy', 'store']]);
    Route::resource('/posts' , 'PostsController', ['only' => ['show', 'edit', 'update', 'destroy', 'store', 'create']]);
    Route::resource('/posts/{post}/comment' , 'CommentController', ['only' => ['store']]);
});

Route::post('/rating/post/{post}', [App\Http\Controllers\Group\PostRatingController::class, 'store'])->name('rating.post.store');
Route::post('/rating/comment/{comment}', [App\Http\Controllers\Group\CommentRatingController::class, 'store'])->name('rating.comment.store');
Route::get('/search', [App\Http\Controllers\Group\GroupsSearchController::class, 'index'])->name('search');
//Route::post('/create', [App\Http\Controllers\Group\CommentController::class, 'store'])->name('create');

