<?php

class HomeController extends BaseController {

	public function getIndex()
	{
		if (Auth::check()) {
			return View::make('layouts.home.index', Auth::user());
		}
		return View::make('layouts.home.index');
	}

	public function getLogin()
	{
		return View::make('layouts.home.login');
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	public function getJoin()
	{
		return View::make('layouts.home.join');
	}

	public function postJoin()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		if (User::where('email',  '=', Input::get('email'))->first()) {
			return Redirect::to('/join')->withInput(Input::except('password', 'password2'));
		} else {
			$user = new User;
			$user->email = $email;
			$user->password = Hash::make($password);
			$user->name = Input::get('name');
			$user->save();
			var_dump(Auth::attempt(array('email' => $email, 'password' => $password)));
			return Redirect::to('/');
		}
	}

	public function postLogin()
	{
		$email 	= Input::get('email');
		$password = Input::get('password');
		var_dump(Input::all());
		if (Auth::attempt(array('email' => $email, 'password' => $password)))
		{
			return Redirect::to('/');
		} else {
			return Redirect::to('/login')->withInput(Input::except('password'));
		}
	}
}
