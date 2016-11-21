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

Route::get('/', 'IndexController@index');

Route::get('/tasks', 'TaskController@index');
Route::get('/task/{task}', 'TaskController@show');

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::get('/reg', function() {
    return view('auth.reg');
});

Route::get('/settings', 'SettingsController@show');
Route::post('/settings', 'SettingsController@update');