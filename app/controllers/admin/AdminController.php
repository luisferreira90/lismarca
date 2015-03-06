<?php

class AdminController extends BaseController {

	public function dashboard() {
  		echo "Estás na área de admin";
	}


	public function logout() {
		if(Auth::check()){
	  		Auth::logout();
		}
	 	return Redirect::route('login');
	}

}
