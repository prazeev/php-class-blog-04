<?php

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

Route::group(['prefix'=> '/'], function () {
    Route::get('/', 'SiteController@index');
    Route::get('/login','UserController@login')->name('user.login.index');
    Route::post('/login','UserController@auth')->name('user.login');
});

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('category', 'CategoryController');
    Route::group(['prefix' => 'post'], function () {
       Route::get('/', 'PostController@index')->name('post.index');
    });
});
