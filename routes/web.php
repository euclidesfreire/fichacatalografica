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

Route::get('/', 'User\HomeController@index')->name('home');

Route::group(['prefix' => 'manager'], function () {
	Route::get('login', 'Manager\Auth\LoginController@showLoginForm')->name('manager.login');
	Route::post('login', 'Manager\Auth\LoginController@authenticate')->name('manager.login');
	Route::get('register', 'Manager\Auth\RegisterController@showRegistrationForm')->name('manager.register');
	Route::post('register', 'Manager\Auth\RegisterController@register')->name('manager.register');
	Route::post('logout', 'Manager\Auth\LoginController@logout')->name('manager.logout');

	Route::get('/', 'Manager\HomeController@index')->name('manager.home');

	Route::group(['prefix' => 'ficha'], function () {
		Route::get('/show', 'manager\FichaController@getShow')->name('manager.ficha.show');
		Route::get('/validar/{id}', 'manager\FichaController@getValidar')->name('manager.ficha.validar');
		Route::post('/validar', 'manager\FichaController@postValidar')->name('manager.ficha.validar');
		Route::get('/indeferir/{id}', 'manager\FichaController@getIndeferir')->name('manager.ficha.indeferir');
		Route::post('/indeferir', 'manager\FichaController@postIndeferir')->name('manager.ficha.indeferir');
		Route::get('/download/{id}', 'manager\FichaController@download')->name('manager.ficha.download');
	});
});

Route::group(['prefix' => 'user'], function () {
	Route::get('/login', 'User\Auth\LoginController@showLoginForm')->name('user.login');
	Route::post('/login', 'User\Auth\LoginController@authenticate')->name('user.login');
	Route::get('register', 'User\Auth\RegisterController@showRegistrationForm')->name('user.register');
	Route::post('register', 'User\Auth\RegisterController@register')->name('user.register');
	Route::post('logout', 'User\Auth\LoginController@logout')->name('user.logout');

	Route::get('/', 'User\HomeController@index')->name('user.home');

	Route::group(['prefix' => 'ficha'], function () {
		Route::get('/', 'User\FichaController@index')->name('user.ficha.index');
		Route::get('/create', 'User\FichaController@getCreate')->name('user.ficha.create');
		Route::post('/create', 'User\FichaController@postCreate')->name('user.ficha.create');
		Route::get('/show', 'User\FichaController@show')->name('user.ficha.show');
		Route::get('/update/{id}', 'User\FichaController@getUpdate')->name('user.ficha.update');
		Route::post('/update', 'User\FichaController@postUpdate')->name('user.ficha.update');
		Route::get('/download/{id}', 'User\FichaController@download')->name('user.ficha.download');
	});
});
