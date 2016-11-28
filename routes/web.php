<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/* Index */
Route::get('/', 'IndexController@index');
Route::post('/', 'IndexController@index');

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::get('/reg', function() {
    return view('auth.reg');
});

/* Settings */
Route::get('/settings', 'SettingsController@show');
Route::post('/settings', 'SettingsController@update');

/* Tasks */
Route::get('/task/new', 'TaskController@create');
Route::post('/task', 'TaskController@store');
Route::delete('/task/delete/{task}', 'TaskController@delete');
Route::get('/task/{task}/edit', 'TaskController@edit');
Route::post('/task/{task}', 'TaskController@update');

/* Phone Number */
Route::get('/phone/{task}', 'TaskController@phone');