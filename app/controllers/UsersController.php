<?php

class UsersController extends BaseController {

	public function login() {
		if(Auth::check()) {
			return Redirect::route('registo');
		}
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

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'confirmed' => 1])){
	        if(User::isAdmin()) {
    	 		return Redirect::to('admin');
	        }
	        return Redirect::route('login')->withInput()->withErrors(array(Lang::get('strings.login_right')));
        }

        return Redirect::route('login')->withInput()->withErrors(array(Lang::get('strings.login_wrong')));
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
		$user = null;
		if(Auth::check()) {
			$user = User::find(Auth::user()->id);
		}
		$entity_types = EntityType::lists('name_pt', 'id');
		$locations = Location::lists('name', 'id');
		return View::make('pages.registration')->with('entity_types', $entity_types)->with('locations', $locations)->with('user', $user);
	}


	public function store() {
		$data = Input::only(['name','email','phone', 'address', 'location', 'entity_type', 'company_name','password','password_confirmation','newsletter']);
		
		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'email' => 'required|email|unique:users', 
			'phone' => 'numeric',
			'password' => 'required|min:6|confirmed',
            'password_confirmation'=> 'required|min:6'
			]);

        if($validator->fails()){
            return Redirect::route('registo')->withErrors($validator)->withInput();
        }

        if (!Input::has('newsletter'))
        	$data['newsletter'] = 0; 

        $confirmation_code = str_random(30);
        $data['confirmation_code'] = $confirmation_code;

		$data['password'] = Hash::make($data['password']);

        $newUser = User::create($data);

        if($newUser){
            Mail::send('pages.verify', array('confirmation_code' => $confirmation_code), function($message) {
            	$message->to(Input::get('email'), Input::get('name'))->subject(Lang::get('strings.verification_email_title'));
	        });

	        Session::flash('flash_message', Lang::get('strings.verification_go_confirm'));
            return Redirect::route('login');
        }
        
	}

	public function update() {		
		$data = Input::only(['name','email','phone', 'address', 'location', 'entity_type', 'company_name','password', 'password_confirmation','newsletter']);

		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'email' => 'required|email|unique:users,email,'.Auth::user()->id, 
			'phone' => 'numeric',
			'password' => 'required|min:6|confirmed',
            'password_confirmation'=> 'required|min:6'
			]);

        if($validator->fails()){
            return Redirect::route('registo')->withErrors($validator)->withInput();
        }

        if (!Input::has('newsletter'))
        	$data['newsletter'] = 0; 

        $data['password'] = Hash::make($data['password']);

        User::find(Auth::user()->id)->fill($data)->save();
    	return Redirect::to('login');      
	}


	public function confirm($confirmation_code) {
        if(!$confirmation_code) {
            throw new InvalidConfirmationCodeException;
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if (!$user) {
        	throw new InvalidConfirmationCodeException;
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        Session::flash('flash_message', Lang::get('strings.verification_confirmed'));

        return Redirect::route('login');
    }

}
