<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'HomeController@index')->middleware('auth');

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
    Route::get('/', 'UsersController@index')->name('users.index');

    Route::get('/create', 'UsersController@create')->name('users.create');
    Route::post('/', 'UsersController@store')->name('users.store');

    Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
    Route::patch('/{user}', 'UsersController@update')->name('users.update');

    Route::get('/account', 'UsersController@edit')->name('users.account');
    Route::patch('/{user}', 'UsersController@update')->name('users.update');

    Route::delete('/{id}', 'UsersController@destroy')->name('users.remove');
});
