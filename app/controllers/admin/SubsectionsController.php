<?php

namespace admin;

use ProductSubsection;
use ProductSection;
use View;
use Input;
use Validator;
use Redirect;

class SubsectionsController extends \BaseController {

	private function storeImage() {
		$file = Input::file('icon');
		$destinationPath = public_path().'/images/produtos/icons'; 
		$filename = 'images/produtos/icons/' . $file->getClientOriginalName();
		$upload_success = Input::file('icon')->move($destinationPath, $filename);
		return $filename;
	}

	public function subsections() {
		$subsection = new ProductSubsection;
		$subsections = $subsection->listAll(Input::all());
		$section = new ProductSection;
		$sections = $section::lists('name', 'id');
  		return View::make('admin.subSections')->with('subSections', $subsections)->with('section', $sections);
	}

	public function subsectionCreate(){
		$sections = ProductSection::lists('name', 'id');
		return View::make('admin.subsectionCreate')->with('sections', $sections);
	}

	public function store() {
		$data = Input::only(['name','ordering','icon', 'section']);
		
		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'ordering' => 'required|numeric',
			'icon' => 'required|image',
			'section' => 'required'
			]);

        if($validator->fails()){
            return Redirect::to('admin/produtos/subseccoes/criar')->withErrors($validator)->withInput();
        }

        $data['icon'] = $this->storeImage();

        $newSubsection = ProductSubsection::create($data);
        if($newSubsection){
            return Redirect::to('admin/produtos/subseccoes');
        }
	}

	public function subsectionEdit($id) {
		$subsection = ProductSubsection::find($id);
		$sections = ProductSection::lists('name', 'id');
		return View::make('admin.subsectionEdit')->with('subsection', $subsection)->with('sections', $sections);
	}

	public function update($id) {
		$data = Input::only(['name','icon', 'section']);
		
		$validator = Validator::make($data, [
			'name' => 'required|min:2'
		]);

        if($validator->fails()){
            return Redirect::to('admin/produtos/subseccoes/' . $id)->withErrors($validator)->withInput();
        }

        if (is_null($data['icon']))
        	$data['icon'] = ProductSubsection::find($id)->icon;
        else
        	$data['icon'] = $this->storeImage();

        $subsection = ProductSubsection::find($id);
		$subsection->fill($data);
		$subsection->save();
        
    	return Redirect::to('admin/produtos/subseccoes/' . $id)->withInput();
        
	}

	public function destroy($id) {

		$subsection = ProductSubsection::find($id)->delete();
		return Redirect::to('admin/produtos/subseccoes');
	}

}
