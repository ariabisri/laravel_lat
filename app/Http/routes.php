<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::group(['middleware' => 'web'], function () {
	Route::get('/', 'GuestController@index'); 
	Route::auth();
	Route::get('/home', 'HomeController@index');
	Route::get('settings/password', 'SettingsController@editPassword');
	Route::post('settings/password', 'SettingsController@updatePassword');
	Route::get('settings/profile' , 'SettingsController@profile');
	Route::get('settings/profile/edit', 'SettingsController@editProfile');
	Route::post('settings/profile', 'SettingsController@updateProfile');
	Route::get('books/{book}/borrow',['middleware'=>['auth', 'role:member'],
		'as'=>'books.borrow',
		'uses'=>'BooksController@borrow']);
	Route::put('books/{book}/return', [
		'middleware'=>['auth', 'role:member'],
		'as'=>'books.return',
		'uses'=>'BooksController@returnBack']);
	Route::group(['prefix' => 'admin' , 'middleware' => ['auth' , 'role:admin']], function(){
		Route::resource('authors' , 'AuthorsController');
		Route::resource('books' , 'BooksController');
		Route::resource('members', 'MembersController', ['only'=>['index', 'show', 'destroy']]);
		Route::get('statistics', ['as'=>'admin.statistics.index',
			'uses'=>'StatisticsController@index']);

	});

// });


