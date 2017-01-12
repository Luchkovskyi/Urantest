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

Route::get('/', 'HomeController@index');

Route::get('/edit', 'CrudController@index');

Route::get('/add', 'CrudController@create');

Route::post('/add', 'CrudController@add');

Route::post('/update', 'CrudController@update');

Route::post('/find', 'HomeController@find');
