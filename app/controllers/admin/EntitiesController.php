<?php

namespace admin;

use View;
use Input;
use Validator;
use Redirect;
use EntityType;

class EntitiesController extends \BaseController {
	
	public function entities() {
  		return View::make('admin.entities')->with('entities', EntityType::all());
	}

	public function entityCreate(){
		return View::make('admin.entity-create');
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

        $newEntity = EntityType::create($data);
        if($newEntity){
            return Redirect::to('admin/entidades');
        }
	}

	public function entityEdit($id) {
		$entities = new EntityType;
		$entity = $entities::find($id);	

		return View::make('admin.entity-edit')->with('entity', $entity);
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

        $entity = EntityType::find($id);
		$entity->fill($data);
		$entity->save();
        
    	return Redirect::to('admin/entidades/' . $id)->withInput();
        
	}

	public function destroy($id) {
		$entity = EntityType::find($id)->delete();
		return Redirect::to('admin/entidades');
	}

}
