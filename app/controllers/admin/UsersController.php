<?php

namespace admin;

use User;
use EntityType;
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

		$entity_type = new EntityType;
		$entities = $entity_type::lists('name_pt', 'id');

		return View::make('admin.userEdit')->with('user', $user)->with('entities', $entities);
	}

	public function update($id) {
		echo $id; die();
		$data = Input::only(['name','email','phone', 'address', 'location', 'entity_type', 'company_name']);
		
		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'email' => 'required|email', 
			'phone' => 'numeric'
			]);

        if($validator->fails()){
            return Redirect::route('userEdit')->withErrors($validator)->withInput();
        }

        $newUser = User::update($data);
    	return Redirect::route('userEdit')->withInput();
        
	}

}
