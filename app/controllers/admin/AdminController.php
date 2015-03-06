<?php

class AdminController extends BaseController {

	public function dashboard() {
  		return View::make('admin.dashboard');
	}

	public function users() {
		$users = DB::table('users')->get();
  		return View::make('admin.users')->with('users', $users);
	}

	public function products() {
  		return View::make('admin.products');
	}


	public function logout() {
		if(Auth::check()){
	  		Auth::logout();
		}
	 	return Redirect::route('login');
	}

}
