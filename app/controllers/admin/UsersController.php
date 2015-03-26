<?php

namespace admin;

use User;
use EntityType;
use Location;
use View;
use Input;
use Validator;
use Redirect;

class UsersController extends \BaseController {

	public function users() {
		$user = new User;
		$users = $user->listAll(Input::all());
		$entity_type = new EntityType;
		$entities = $entity_type::lists('name_pt', 'id');
		$location = new Location;
		$locations = $location::lists('name', 'id');

  		return View::make('admin.user')->with('users', $users)->with('entities', $entities)->with('locations', $locations)->withInput(Input::all());
	}

	public function userEdit($id) {
		$users = new User;
		$user = $users::find($id);	

		$entity_type = new EntityType;
		$entities = $entity_type::lists('name_pt', 'id');
		$location = new Location;
		$locations = $location::lists('name', 'id');

		return View::make('admin.user-edit')->with('user', $user)->with('entities', $entities)->with('locations', $locations);
	}

	public function update($id) {
		$data = Input::only(['name','email','phone', 'address', 'location', 'entity_type', 'company_name']);
		
		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'email' => 'required|email', 
			'phone' => 'numeric'
		]);

        if($validator->fails()){
            return Redirect::to('admin/utilizadores/' . $id)->withErrors($validator)->withInput();
        }

        if(User::find($id)->is_admin) {
        	return Redirect::to('admin/utilizadores/' . $id)
        	->withErrors(array('message' => 'Não pode modificar o administrador'))
        	->withInput();
        }

        $user = User::find($id);
		$user->fill($data);
		$user->save();
        
    	return Redirect::to('admin/utilizadores/' . $id)->withInput();
        
	}

	public function destroy($id) {

		if(User::find($id)->is_admin) {
        	return Redirect::to('admin/utilizadores/' . $id)
        	->withErrors(array('message' => 'Não pode apagar o administrador'))
        	->withInput();
        }

		$user = User::find($id)->delete();
		return Redirect::to('admin/utilizadores/');
	}

}
