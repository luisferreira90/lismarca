<?php

namespace admin;

use ProductSubsection;
use ProductSection;
use View;
use Input;
use Validator;
use Redirect;

class SubsectionsController extends \BaseController {

	private function validate($data) {
		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'ordering' => 'numeric',
			'icon' => 'image',
			'section' => 'required'
			]);

        if($validator->fails()){
            return $validator;
        }

        return false;
	}


	public function subsections() {
		$subsection = new ProductSubsection;
		$subsections = $subsection->listAll(Input::all());
		$sections = ProductSection::lists('name', 'id');
  		return View::make('admin.subsection')->with('subSections', $subsections)->with('section', $sections);
	}


	public function create(){
		return View::make('admin.subsection-edit')->with('sections', ProductSection::lists('name', 'id'));
	}


	public function store() {
		$data = Input::all();
		$validator = $this->validate($data);
        if($validator)
            return Redirect::to('admin/subseccoes/criar')->withErrors($validator)->withInput();

        if(isset($data['icon'])) 
        	$data['icon'] = ProductSubsection::storeImage(Input::file('icon'));

        $new = ProductSubsection::create($data);
        if($new){
            return Redirect::to('admin/subseccoes');
        }
	}


	public function edit($id) {
		$sections = ProductSection::lists('name', 'id');
		return View::make('admin.subsection-edit')->with('subsection', ProductSubsection::find($id))->with('sections', $sections);
	}


	public function update($id) {
		$validator = $this->validate(Input::all());
        if($validator)
            return Redirect::to('admin/subseccoes/' . $id)->withErrors($validator)->withInput();

        if (Input::file('icon')) {
			$data = Input::all();
        	$data['icon'] = ProductSubsection::storeImage(Input::file('icon'));
    	}
        else {
        	$data = Input::only(['name','ordering', 'section']);
        }		

        ProductSubsection::find($id)->fill($data)->save();        
    	return Redirect::to('admin/subseccoes/' . $id)->withInput();
	}


	public function destroy($id) {
		ProductSubsection::find($id)->delete();
		return Redirect::to('admin/subseccoes');
	}


	public function unpublish($id) {
		ProductSubsection::find($id)->unpublish($id);
		return Redirect::to('admin/subseccoes');
	}


	public function publish($id) {
		ProductSubsection::find($id)->publish($id);
		return Redirect::to('admin/subseccoes');
	}

}
