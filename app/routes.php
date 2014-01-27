<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});
Route::get('alpha','HomeController@artist_alpha');
Route::post('artistsnames', 'HomeController@artists_names');
Route::post('albums', 'HomeController@artist_albums');
Route::post('songs', 'HomeController@artist_songs');