<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
	public function artist_alpha()
	{
		
		$alpha = select_artist_by_alpha();
		return Response::json($alpha);
	}
	public function artists_names()
	{
		if(Input::has('alpha')){
			$artists_names = select_artist_by_name(Input::get('alpha'));
			return Response::json($artists_names);
		}
		return "Wrong request";
		
		
	}
	public function artist_albums()
	{
		if(Input::has('alpha') &&  Input::has('name'))
			$albums = arAlbums(Input::get('alpha'),Input::get('name'));
		return Response::json($albums) ;
	}
	public function artist_songs(){
		if(Input::has('alpha') &&  Input::has('name') &&  Input::has('album'))
			$songs = getSongs(Input::get('alpha'),Input::get('name'),Input::get('album'));
		return Response::json($songs) ;
	}


}