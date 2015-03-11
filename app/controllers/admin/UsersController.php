<?php

namespace admin;

use User;
use View;

class UsersController extends \BaseController {

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

}
