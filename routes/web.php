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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/teams', 'TeamsController@index');
Route::get('/teams/create', 'TeamsController@create');
Route::get('/teams/{team}', 'TeamsController@show');
Route::get('/teams/{team}/edit', 'TeamsController@edit');
Route::post('/teams/{team}', 'TeamsController@update');
Route::put('/teams', 'TeamsController@store');
Route::delete('/teams/{team}', 'TeamsController@destroy');