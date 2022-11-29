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

Route::prefix('posts')->group(function() {
    Route::get('/', 'PostsController@index')->name('posts.index');
    Route::get('/create', 'PostsController@create')->name('posts.create');
    Route::post('/store', 'PostsController@store')->name('posts.store');
    Route::get('/edit/{id}', 'PostsController@edit')->name('posts.edit');
    Route::get('/show/{id}', 'PostsController@show')->name('posts.show');
    Route::post('/update/{id}', 'PostsController@update')->name('posts.update');
    Route::post('/delete/{id}', 'PostsController@destroy')->name('posts.delete');
});
