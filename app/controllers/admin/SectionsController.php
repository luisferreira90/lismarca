<?php

namespace admin;

use ProductSection;
use View;
use Input;
use Validator;
use Redirect;

class SectionsController extends \BaseController {

	private function validate($data) {
		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'ordering' => 'required|numeric',
			'icon' => 'image'
			]);

        if($validator->fails()){
            return $validator;
        }

        return false;
	}
	

	public function sections() {
  		return View::make('admin.sections')->with('sections', ProductSection::all());
	}


	public function create(){
		return View::make('admin.section-create');
	}


	public function store() {
		$validator = $this->validate(Input::all());
        if($validator)
        	return Redirect::to('admin/seccoes/criar')->withErrors($validator)->withInput();

        $data['icon'] = ProductSection::storeImage(Input::file('icon'));

        $new = ProductSection::create($data);
        if($new){
            return Redirect::to('admin/seccoes');
        }
	}


	public function edit($id) {
		return View::make('admin.section-edit')->with('section', ProductSection::find($id));
	}


	public function update($id) {
        $validator = $this->validate(Input::all());
        if($validator)
        	return Redirect::to('admin/seccoes/' . $id)->withErrors($validator)->withInput();

		if (Input::file('icon')) {
			$data = Input::only(['name','ordering','icon']);
        	$data['icon'] = ProductSection::storeImage(Input::file('icon'));
    	}
        else {
        	$data = Input::only(['name','ordering']);
        }		

        ProductSection::find($id)->fill($data)->save();
    	return Redirect::to('admin/seccoes/' . $id)->withInput();      
	}


	public function destroy($id) {
		ProductSection::find($id)->delete();
		return Redirect::to('admin/seccoes');
	}


	public function unpublish($id) {
		ProductSection::find($id)->unpublish($id);
		return Redirect::to('admin/seccoes');
	}


	public function publish($id) {
		ProductSection::find($id)->publish($id);
		return Redirect::to('admin/seccoes');
	}

}
