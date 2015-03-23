<?php

namespace admin;

use ProductSection;
use View;
use Input;
use Validator;
use Redirect;

class SectionsController extends \BaseController {

	private function storeImage() {
		$file = Input::file('icon');
		$destinationPath = public_path().'/images/produtos/icons'; 
		$filename = 'images/produtos/icons/' . $file->getClientOriginalName();
		$upload_success = Input::file('icon')->move($destinationPath, $filename);
		return $filename;
	}

	
	public function sections() {
  		return View::make('admin.sections')->with('sections', ProductSection::all());
	}

	public function sectionCreate(){
		return View::make('admin.sectionCreate');
	}

	public function store() {
		$data = Input::only(['name','ordering','icon']);
		
		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'ordering' => 'required|numeric',
			'icon' => 'required|image'
			]);

        if($validator->fails()){
            return Redirect::to('admin/produtos/seccoes/criar')->withErrors($validator)->withInput();
        }

        $data['icon'] = $this->storeImage();

        $newSection = ProductSection::create($data);
        if($newSection){
            return Redirect::to('admin/produtos/seccoes');
        }
	}

	public function sectionEdit($id) {
		$sections = new ProductSection;
		$section = $sections::find($id);	

		return View::make('admin.sectionEdit')->with('section', $section);
	}

	public function update($id) {
		$data = Input::only(['name','icon']);
		
		$validator = Validator::make($data, [
			'name' => 'required|min:2'
		]);

        if($validator->fails()){
            return Redirect::to('admin/produtos/seccoes/' . $id)->withErrors($validator)->withInput();
        }


        if (is_null($data['icon']))
        	$data['icon'] = ProductSection::find($id)->icon;
        else
        	$data['icon'] = $this->storeImage();

        $section = ProductSection::find($id);
		$section->fill($data);
		$section->save();
        
    	return Redirect::to('admin/produtos/seccoes/' . $id)->withInput();
        
	}

	public function destroy($id) {
		$section = ProductSection::find($id)->delete();
		return Redirect::to('admin/produtos/seccoes');
	}

}
