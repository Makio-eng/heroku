<?php

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    // ニュース関連
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create'); 
    Route::get('news', 'Admin\NewsController@index');
    Route::get('news/edit', 'Admin\NewsController@edit');
    Route::post('news/edit', 'Admin\NewsController@update');
    Route::get('news/delete', 'Admin\NewsController@delete'); 
    // プロフィール関連
    Route::get('profile/create','Admin\ProfileController@add');
    Route::post('profile/create','Admin\ProfileController@create');
    Route::get('profile/edit','Admin\ProfileController@edit');
    Route::post('profile/update','Admin\ProfileController@update');
    Route::get('profile', 'Admin\ProfileController@index');
    Route::get('profile/delete', 'Admin\ProfileController@delete'); 

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'NewsController@index');
Route::get('/profile', 'ProfileController@indexAction');