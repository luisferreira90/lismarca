<?php

namespace admin;

use ProductCategory;
use ProductSubsection;
use View;
use Input;
use Validator;
use Redirect;

class CategoriesController extends \BaseController {

	private function validate($data) {
		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'name_en' => 'required|min:2',
			'ordering' => 'numeric',
			'icon' => 'image',
			'subsection' => 'required'
			]);

        if($validator->fails()){
            return $validator;
        }

        return false;
	}


	public function categories() {
		$category = new ProductCategory;
		$categories = $category->listAll(Input::all());
  		return View::make('admin.category')->with('categories', $categories)->with('subsection', ProductSubsection::lists('name', 'id'));
	}


	public function create(){
		return View::make('admin.category-edit')->with('subsections', ProductSubsection::lists('name', 'id'));
	}


	public function store() {
		$data = Input::all();
		$validator = $this->validate($data);
        if($validator)
            return Redirect::to('admin/categorias/criar')->withErrors($validator)->withInput();

        if(isset($data['icon'])) 
        	$data['icon'] = ProductCategory::storeImage(Input::file('icon'));

        $new = ProductCategory::create($data);
        if($new){
            return Redirect::to('admin/categorias');
        }
	}


	public function edit($id) {
		$category = ProductCategory::find($id);
		return View::make('admin.category-edit')->with('category', $category)->with('subsections', ProductSubsection::lists('name', 'id'));
	}


	public function update($id) {
		$validator = $this->validate(Input::all());
        if($validator)
        	return Redirect::to('admin/categorias/' . $id)->withErrors($validator)->withInput();

		if (Input::file('icon')) {
			$data = Input::all();
        	$data['icon'] = ProductCategory::storeImage(Input::file('icon'));
    	}
        else {
        	$data = Input::only(['name', 'name_en', 'ordering', 'subsection']);
        }

        ProductCategory::find($id)->fill($data)->save();
    	return Redirect::to('admin/categorias/' . $id)->withInput();
	}


	public function destroy($id) {
		ProductCategory::find($id)->delete();
		return Redirect::to('admin/categorias');
	}


	public function unpublish($id) {
		ProductCategory::find($id)->unpublish($id);
		return Redirect::to('admin/categorias');
	}


	public function publish($id) {
		ProductCategory::find($id)->publish($id);
		return Redirect::to('admin/categorias');
	}

}
