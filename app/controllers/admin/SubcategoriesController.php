<?php

namespace admin;

use ProductSubcategory;
use ProductCategory;
use View;
use Input;
use Validator;
use Redirect;

class SubcategoriesController extends \BaseController {

	private function validate($data) {
		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'ordering' => 'numeric',
			'icon' => 'image',
			'category' => 'required'
			]);

        if($validator->fails()){
            return $validator;
        }

        return false;
	}


	public function subCategories() {
		$subcategory = new ProductSubcategory;
		$subcategories = $subcategory->listAll(Input::all());
  		return View::make('admin.subcategory')->with('subcategories', $subcategories)->with('categories', ProductCategory::lists('name', 'id'));
	}


	public function create(){
		return View::make('admin.subcategory-edit')->with('categories', ProductCategory::lists('name', 'id'));
	}


	public function store() {
		$data = Input::all();
		$validator = $this->validate($data);
        if($validator)
            return Redirect::to('admin/subcategorias/criar')->withErrors($validator)->withInput();

       if(isset($data['icon'])) 
        	$data['icon'] = ProductSubcategory::storeImage(Input::file('icon'));

        $new = ProductSubcategory::create($data);
        if($new){
            return Redirect::to('admin/subcategorias');
        }
	}


	public function edit($id) {
		$subcategory = ProductSubcategory::find($id);
		return View::make('admin.subcategory-edit')->with('subcategory', $subcategory)->with('categories', ProductCategory::lists('name', 'id'));
	}


	public function update($id) {
		$validator = $this->validate(Input::all());
        if($validator)
        	return Redirect::to('admin/subcategorias/' . $id)->withErrors($validator)->withInput();

		if (Input::file('icon')) {
			$data = Input::all();
        	$data['icon'] = ProductSubcategory::storeImage(Input::file('icon'));
    	}
        else {
        	$data = Input::only(['name','ordering','category']);
        }		

        ProductSubcategory::find($id)->fill($data)->save();        
    	return Redirect::to('admin/subcategorias/' . $id)->withInput();
	}


	public function destroy($id) {
		ProductSubcategory::find($id)->delete();
		return Redirect::to('admin/subcategorias');
	}


	public function unpublish($id) {
		ProductSubcategory::find($id)->unpublish($id);
		return Redirect::to('admin/subcategorias');
	}


	public function publish($id) {
		ProductSubcategory::find($id)->publish($id);
		return Redirect::to('admin/subcategorias');
	}

}