<?php

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.request.post');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset.post');

Route::get('/', 'HomeController@index')->middleware('auth')->name('home');

Route::group(['prefix' => 'users', 'middleware' => ['auth', 'has-access-rights']], function () {
    Route::get('/', 'UsersController@index')->name('users.index');

    Route::get('/create', 'UsersController@create')->name('users.create');
    Route::post('/', 'UsersController@store')->name('users.store');

    Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
    Route::patch('/{user}', 'UsersController@update')->name('users.update');

    Route::get('/account', 'UsersController@edit')->name('users.account');
    Route::patch('/{user}', 'UsersController@update')->name('users.update');

    Route::delete('/{id}', 'UsersController@destroy')->name('users.remove');
});

Route::group(['prefix' => 'roles', 'middleware' => ['auth', 'has-access-rights']], function () {
    Route::get('/', 'RolesController@index')->name('roles.index');
    Route::get('/create', 'RolesController@create')->name('roles.create');
    Route::post('/', 'RolesController@store')->name('roles.store');
    Route::get('/{role}/edit', 'RolesController@edit')->name('roles.edit');
    Route::patch('/{role}', 'RolesController@update')->name('roles.update');
    Route::delete('/{id}', 'RolesController@destroy')->name('roles.remove');
});

Route::group(['prefix' => 'departments', 'middleware' => ['auth', 'has-access-rights']], function () {
    Route::get('/', 'DepartmentsController@index')->name('departments.index');
    Route::get('/create', 'DepartmentsController@create')->name('departments.create');
    Route::post('/', 'DepartmentsController@store')->name('departments.store');
    Route::get('/{department}/edit', 'DepartmentsController@edit')->name('departments.edit');
    Route::patch('/{department}', 'DepartmentsController@update')->name('departments.update');
});

Route::group(['prefix' => 'teams', 'middleware' => ['auth', 'has-access-rights']], function () {
    Route::get('/', 'TeamsController@index')->name('teams.index');
    Route::get('/create', 'TeamsController@create')->name('teams.create');
    Route::post('/', 'TeamsController@store')->name('teams.store');
    Route::get('/{team}/edit', 'TeamsController@edit')->name('teams.edit');
    Route::patch('/{team}', 'TeamsController@update')->name('teams.update');
});

Route::group(['prefix' => 'employees', 'middleware' => ['auth', 'has-access-rights']], function () {
    Route::get('/', 'EmployeesController@index')->name('employees.index');
    Route::get('/create', 'EmployeesController@create')->name('employees.create');
    Route::post('/', 'EmployeesController@store')->name('employees.store');
    Route::get('/{employee}', 'EmployeesController@show')->name('employees.view');
    Route::get('/{employee}/edit', 'EmployeesController@edit')->name('employees.edit');
    Route::patch('/{employee}', 'EmployeesController@update')->name('employees.update');
});

Route::group(['prefix' => 'documents/templates', 'middleware' => ['auth', 'has-access-rights']], function () {
    Route::get('/', 'DocumentTemplateController@index')->name('documentTemplates.index');
    Route::get('/create', 'DocumentTemplateController@create')->name('documentTemplates.create');
    Route::post('/', 'DocumentTemplateController@store')->name('documentTemplates.store');
    Route::get('/{template}', 'DocumentTemplateController@show')->name('documentTemplates.show');
    Route::get('/{template}/edit', 'DocumentTemplateController@edit')->name('documentTemplates.edit');
    Route::patch('/{template}', 'DocumentTemplateController@update')->name('documentTemplates.update');
});

Route::group(['prefix' => 'documents/keywords', 'middleware' => ['auth', 'has-access-rights']], function () {
    Route::get('/', 'DocumentsKeywordsController@index')->name('documentsKeywords.index');
    Route::get('/create', 'DocumentsKeywordsController@create')->name('documentsKeywords.create');
    Route::post('/', 'DocumentsKeywordsController@store')->name('documentsKeywords.store');
    Route::get('/{keyword}/edit', 'DocumentsKeywordsController@edit')->name('documentsKeywords.edit');
    Route::patch('/{keyword}', 'DocumentsKeywordsController@update')->name('documentsKeywords.update');
});
