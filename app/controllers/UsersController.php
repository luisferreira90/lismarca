<?php

class UsersController extends BaseController {

	public function login() {
		return View::make('pages.login');
	}


	public function handleLogin() {
		$data = Input::only(['email', 'password']);

		$validator = Validator::make($data, [
			'email' => 'required|email', 
			'password' => 'required'
			]);

        if($validator->fails()){
            return Redirect::route('login')->withErrors($validator)->withInput();
        }

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
	        User::isAdmin();
        
            return Redirect::to('profile');
        }

        return Redirect::route('login')->withInput();
	}


	public function logout() {
		if(Auth::check()){
	  		Auth::logout();
		}
	 	return Redirect::route('login');
	}


	public function profile() {
		return View::make('pages.profile');
	}


	public function registration()
	{
		$entity_type = new EntityType;
		$data = $entity_type::lists('name_pt', 'id');
		return View::make('pages.registration')->with('data', $data);
	}


	public function store() {
		$data = Input::only(['name','email','phone', 'address', 'location', 'entity_type', 'company_name','password', 'password_confirmation']);
		
		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'email' => 'required|email', 
			'phone' => 'numeric',
			'password' => 'required|min:6|confirmed',
            'password_confirmation'=> 'required|min:6'
			]);

        if($validator->fails()){
            return Redirect::route('registo')->withErrors($validator)->withInput();
        }

		$data['password'] = Hash::make($data['password']);

        $newUser = User::create($data);
        if($newUser){
            Auth::login($newUser);
            return Redirect::route('profile');
        }
        
	}

}
