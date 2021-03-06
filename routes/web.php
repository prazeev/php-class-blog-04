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
    Route::get('/register','UserController@register')->name('user.register.index');
    Route::post('/login','UserController@auth')->name('user.login');
    Route::post('/register','UserController@signup')->name('user.register');


    Route::get('{category_slug}/{post_slug}', 'SiteController@singlePage')->name('single.page');


    // auth group
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', 'UserController@profile')->name('user.profile');
        Route::post('/post', 'PostController@create')->name('post.create');
        Route::get('/post', 'PostController@index')->name('post.list');
    });


    Route::get('{slug}', 'SiteController@categoryPage');
});

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('category', 'CategoryController');
    Route::group(['prefix' => 'post'], function () {
       Route::get('/', 'PostController@index')->name('post.index');
    });
});
