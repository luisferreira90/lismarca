<?php

namespace admin;

use View;
use Input;
use Validator;
use Redirect;
use EntityType;

class EntitiesController extends \BaseController {
	
	public function entities() {
  		return View::make('admin.entity')->with('entities', EntityType::all());
	}


	public function create(){
		return View::make('admin.entity-edit');
	}


	public function store() {
		$data = Input::only(['name_pt','name_en']);
		
		$validator = Validator::make($data, [
			'name_pt' => 'required|min:2',
			'name_en' => 'required|min:2'
			]);

        if($validator->fails()){
            return Redirect::to('admin/entidades/criar')->withErrors($validator)->withInput();
        }

        $new = EntityType::create($data);
        if($new){
            return Redirect::to('admin/entidades');
        }
	}


	public function edit($id) {
		return View::make('admin.entity-edit')->with('entity', EntityType::find($id));
	}


	public function update($id) {
		$data = Input::only(['name_pt','name_en']);
		
		$validator = Validator::make($data, [
			'name_pt' => 'required|min:2',
			'name_en' => 'required|min:2'
		]);

        if($validator->fails()){
            return Redirect::to('admin/entidades/' . $id)->withErrors($validator)->withInput();
        }

        EntityType::find($id)->fill($data)->save();       
    	return Redirect::to('admin/entidades/' . $id)->withInput();
	}


	public function destroy($id) {
		EntityType::find($id)->delete();
		return Redirect::to('admin/entidades');
	}

}