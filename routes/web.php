<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\PostController@index')->name('home');
Route::get('/article/{slug}', 'App\Http\Controllers\PostController@show')->name('posts.single');
Route::get('/category/{slug}', 'App\Http\Controllers\CategoryController@show')->name('categories.single');
Route::get('/tag/{slug}', 'App\Http\Controllers\TagController@show')->name('tags.single');
Route::get('/search', 'App\Http\Controllers\SearchController@index')->name('search');

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'admin'],function (){
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/posts', 'PostController');
});

Route::group(['middleware' => 'guest'], function (){
    Route::get('/register', '\App\Http\Controllers\UserController@create')->name('register.create');
    Route::post('/register', '\App\Http\Controllers\UserController@store')->name('register.store');
    Route::get('/login', '\App\Http\Controllers\UserController@loginCreate')->name('login.create');
    Route::post('/login', '\App\Http\Controllers\UserController@login')->name('login');
});

Route::get('/logout', '\App\Http\Controllers\UserController@logout')->name('logout')->middleware('auth');
