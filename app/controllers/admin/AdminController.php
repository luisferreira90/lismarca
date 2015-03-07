<?php

class AdminController extends BaseController {

	public function dashboard() {
  		return View::make('admin.dashboard');
	}

	public function users() {
		$users = DB::table('users')->select('id', 'name', 'email', 'phone', 'address', 'location', 'entity_type', 'company_name', 'created_at')->get();
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
