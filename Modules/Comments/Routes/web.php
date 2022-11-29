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

Route::prefix('comments')->group(function() {
    Route::get('/', 'CommentsController@index');
    Route::post('/store', 'CommentsController@store')->name('comments.store');
    Route::get('/show/{id}', 'CommentsController@show')->name('comments.show');
    Route::post('/update/{id}', 'CommentsController@update')->name('comments.update');
    Route::post('/delete/{id}', 'CommentsController@destroy')->name('comments.delete');
});
