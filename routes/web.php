<?php

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.request.post');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset.post');

Route::get('/', 'HomeController@index')->middleware('auth')->name('home');

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

Route::group(['prefix' => 'roles', 'middleware' => 'auth'], function () {
    Route::get('/', 'RolesController@index')->name('roles.index');
    Route::get('/create', 'RolesController@create')->name('roles.create');
    Route::post('/', 'RolesController@store')->name('roles.store');
    Route::get('/{role}/edit', 'RolesController@edit')->name('roles.edit');
    Route::patch('/{role}', 'RolesController@update')->name('roles.update');
    Route::delete('/{id}', 'RolesController@destroy')->name('roles.remove');
});
