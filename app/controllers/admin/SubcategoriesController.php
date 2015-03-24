<?php

namespace admin;

use ProductSubcategory;
use ProductCategory;
use View;
use Input;
use Validator;
use Redirect;

class SubcategoriesController extends \BaseController {

	private function storeImage() {
		$file = Input::file('icon');
		$destinationPath = public_path().'/images/produtos/icons'; 
		$filename = 'images/produtos/icons/' . $file->getClientOriginalName();
		$upload_success = Input::file('icon')->move($destinationPath, $filename);
		return $filename;
	}


	public function subCategories() {
		$subcategory = new ProductSubcategory;
		$subcategories = $subcategory->listAll(Input::all());
		$category = new ProductCategory;
		$categories = $category::lists('name', 'id');
  		return View::make('admin.subcategories')->with('subcategories', $subcategories)->with('categories', $categories);
	}

	public function subcategoryCreate(){
		$categories = ProductCategory::lists('name', 'id');
		return View::make('admin.subcategoryCreate')->with('categories', $categories);
	}

	public function store() {
		$data = Input::only(['name','ordering','icon', 'category']);
		
		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'ordering' => 'required|numeric',
			'icon' => 'required|image',
			'category' => 'required'
			]);

        if($validator->fails()){
            return Redirect::to('admin/produtos/subcategorias/criar')->withErrors($validator)->withInput();
        }

        $data['icon'] = $this->storeImage();

        $newSubcategory = ProductSubcategory::create($data);
        if($newSubcategory){
            return Redirect::to('admin/produtos/subcategorias');
        }
	}

	public function subcategoryEdit($id) {
		$subcategory = ProductSubcategory::find($id);
		$categories = ProductCategory::lists('name', 'id');
		return View::make('admin.subcategoryEdit')->with('subcategory', $subcategory)->with('categories', $categories);
	}

	public function update($id) {
		$data = Input::only(['name','icon', 'category','ordering']);
		
		$validator = Validator::make($data, [
			'name' => 'required|min:2'
		]);

        if($validator->fails()){
            return Redirect::to('admin/produtos/subcategorias/' . $id)->withErrors($validator)->withInput();
        }

        if (is_null($data['icon']))
        	$data['icon'] = ProductSubcategory::find($id)->icon;
        else
        	$data['icon'] = $this->storeImage();

        $subcategory = ProductSubcategory::find($id);
		$subcategory->fill($data);
		$subcategory->save();
        
    	return Redirect::to('admin/produtos/subcategorias/' . $id)->withInput();
        
	}

	public function destroy($id) {

		$subcategory = ProductSubcategory::find($id)->delete();
		return Redirect::to('admin/produtos/subcategorias');
	}

	public function unpublish($id) {
		$subcategory = ProductSubcategory::find($id)->unpublish($id);
		return Redirect::to('admin/produtos/subcategorias');
	}

	public function publish($id) {
		$subcategory = ProductSubcategory::find($id)->publish($id);
		return Redirect::to('admin/produtos/subcategorias');
	}

}
