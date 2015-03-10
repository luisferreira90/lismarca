<?php

class AdminController extends BaseController {

	public function dashboard() {
  		return View::make('admin.dashboard');
	}

	public function users() {
		$user = new User;
		$users = $user->listAll();
  		return View::make('admin.users')->with('users', $users);
	}

	public function userEdit($id) {
		$users = new User;
		$user = $users::find($id);
		return View::make('admin.userEdit')->with('user', $user);
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
