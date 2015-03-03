<?php

class UsersController extends BaseController {

	public function login() {
		return View::make('pages.login');
	}

	public function handleLogin() {
		$data = Input::only(['email', 'password']);

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
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
		return View::make('pages.registration')->with('data', $data);;
	}

	public function store() {
		$data = Input::only(['name','email','phone', 'address', 'location', 'entity_type', 'company_name','password']);
		$data['password'] = Hash::make($data['password']);

        $newUser = User::create($data);
        if($newUser){
            Auth::login($newUser);
            return Redirect::route('profile');
        }
        
	}

}
