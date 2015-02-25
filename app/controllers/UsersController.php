<?php

class UsersController extends BaseController {

	public function registration()
	{
		return View::make('pages/registration');
	}

	public function create() {
		return View::make('pages/registration');	
	}

	public function store() {
		$data = Input::only(['name','email','phone','password']);
		var_dump($data);
		/*
        $newUser = User::create($data);
        if($newUser){
            Auth::login($newUser);
            return Redirect::route('profile');
        }

        return Redirect::route('user.create')->withInput();*/
	}

}
