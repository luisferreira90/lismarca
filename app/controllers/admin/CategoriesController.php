<?php

namespace admin;

use ProductCategory;
use ProductSubsection;
use View;
use Input;
use Validator;
use Redirect;

class CategoriesController extends \BaseController {

	private function storeImage() {
		$file = Input::file('icon');
		$destinationPath = public_path().'/images/produtos/icons'; 
		$filename = 'images/produtos/icons/' . $file->getClientOriginalName();
		$upload_success = Input::file('icon')->move($destinationPath, $filename);
		return $filename;
	}


	public function categories() {
		$category = new ProductCategory;
		$categories = $category->listAll(Input::all());
		$subsection = new ProductSubsection;
		$subsections = $subsection::lists('name', 'id');
  		return View::make('admin.categories')->with('categories', $categories)->with('subsection', $subsections);
	}

	public function categoryCreate(){
		$subsections = ProductSubsection::lists('name', 'id');
		return View::make('admin.category-create')->with('subsections', $subsections);
	}

	public function store() {
		$data = Input::only(['name','ordering','icon', 'subsection']);
		
		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'ordering' => 'required|numeric',
			'icon' => 'required|image',
			'subsection' => 'required'
			]);

        if($validator->fails()){
            return Redirect::to('admin/categorias/criar')->withErrors($validator)->withInput();
        }

        $data['icon'] = $this->storeImage();

        $newCategory = ProductCategory::create($data);
        if($newCategory){
            return Redirect::to('admin/categorias');
        }
	}

	public function categoryEdit($id) {
		$category = ProductCategory::find($id);
		$subsections = ProductSubsection::lists('name', 'id');
		return View::make('admin.category-edit')->with('category', $category)->with('subsections', $subsections);
	}

	public function update($id) {
		$data = Input::only(['name','icon', 'subsection','ordering']);
		
		$validator = Validator::make($data, [
			'name' => 'required|min:2'
		]);

        if($validator->fails()){
            return Redirect::to('admin/categorias/' . $id)->withErrors($validator)->withInput();
        }

        if (is_null($data['icon']))
        	$data['icon'] = ProductCategory::find($id)->icon;
        else
        	$data['icon'] = $this->storeImage();

        $category = ProductCategory::find($id);
		$category->fill($data);
		$category->save();
        
    	return Redirect::to('admin/categorias/' . $id)->withInput();
        
	}

	public function destroy($id) {

		$category = ProductCategory::find($id)->delete();
		return Redirect::to('admin/categorias');
	}

	public function unpublish($id) {
		$category = ProductCategory::find($id)->unpublish($id);
		return Redirect::to('admin/categorias');
	}

	public function publish($id) {
		$category = ProductCategory::find($id)->publish($id);
		return Redirect::to('admin/categorias');
	}

}