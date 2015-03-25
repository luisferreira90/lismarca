<?php

namespace admin;

use View;
use Input;
use Validator;
use Redirect;
use Location;

class LocationsController extends \BaseController {
	
	public function locations() {
  		return View::make('admin.locations')->with('locations', Location::all());
	}

	public function create(){
		return View::make('admin.location-create');
	}

	public function store() {
		$data = Input::only(['name']);
		
		$validator = Validator::make($data, [
			'name' => 'required|min:2'
			]);

        if($validator->fails()){
            return Redirect::to('admin/localizacoes/criar')->withErrors($validator)->withInput();
        }

        $new = Location::create($data);
        if($new){
            return Redirect::to('admin/localizacoes');
        }
	}

	public function edit($id) {
		$locations = new Location;
		$location = $locations::find($id);	

		return View::make('admin.location-edit')->with('location', $location);
	}

	public function update($id) {
		$data = Input::only(['name']);
		
		$validator = Validator::make($data, [
			'name' => 'required|min:2'
		]);

        if($validator->fails()){
            return Redirect::to('admin/localizacoes/' . $id)->withErrors($validator)->withInput();
        }

        $location = Location::find($id);
		$location->fill($data);
		$location->save();
        
    	return Redirect::to('admin/localizacoes/' . $id)->withInput();
        
	}

	public function destroy($id) {
		$location = Location::find($id)->delete();
		return Redirect::to('admin/localizacoes');
	}

}
