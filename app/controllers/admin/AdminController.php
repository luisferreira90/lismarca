<?php

namespace admin;

use View;

class AdminController extends \BaseController {

	public function dashboard() {
  		return View::make('admin.dashboard');
	}


	public function logout() {
		if(Auth::check()){
	  		Auth::logout();
		}
	 	return Redirect::route('login');
	}

}
