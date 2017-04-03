<?php

Route::get('/', ['as' => 'homepage', 'uses' => 'HomeCtrl@index']);

Route::get('/login', ['as' => 'login', 'uses' =>'Auth\LoginController@showLoginForm']);
Route::post('/login', ['as' => 'postLogin', 'uses' => 'Auth\LoginController@login']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
	Route::get('/', 'AdminCtrl@index');

	Route::get('/users', 'UserCtrl@index');
	Route::post('/users/add', ['as' => 'postAddUser', 'uses' => 'UserCtrl@postAddUser']);
	Route::post('/users/edit', ['as' => 'postEditUser', 'uses' => 'UserCtrl@postEditUser']);
	Route::get('/users/delete/{id}', ['as' => 'deleteUser', 'uses' => 'UserCtrl@deleteUser']);

	Route::get('/locations', 'LocationCtrl@index');
	Route::post('/locations/add', ['as' => 'postAddLocation', 'uses' => 'LocationCtrl@postAddLocation']);
	Route::post('/locations/edit', ['as' => 'postEditLocation', 'uses' => 'LocationCtrl@postEditLocation']);
	Route::get('/locations/delete/{id}', ['as' => 'deleteLocation', 'uses' => 'LocationCtrl@deleteLocation']);
});

