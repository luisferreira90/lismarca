<?php

namespace admin;

use ProductItem;
use ProductSubcategory;
use View;
use Input;
use Validator;
use Redirect;

class ItemsController extends \BaseController {

	private function validate($data) {
		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'description' => 'required',
			'icon' => 'image',
			'subcategory' => 'required'
			]);

        if($validator->fails()){
            return $validator;
        }

        return false;
	}


	public function items() {
		$item = new ProductItem;
		$items = $item->listAll(Input::all());
  		return View::make('admin.item')->with('items', $items)->with('subcategories', ProductSubcategory::lists('name', 'id'));
	}


	public function create(){
		return View::make('admin.item-edit')->with('subcategories', ProductSubcategory::lists('name', 'id'));
	}


	public function store() {
		$data = Input::all();
		$validator = $this->validate($data);
        if($validator)
            return Redirect::to('admin/items/criar')->withErrors($validator)->withInput();

        if(isset($data['icon'])) 
        	$data['icon'] = ProductItem::storeImage(Input::file('icon'));

        $new = ProductItem::create($data);
        if($new){
            return Redirect::to('admin/items');
        }
	}


	public function edit($id) {
		return View::make('admin.item-edit')->with('item', ProductItem::find($id))->with('subcategories', ProductSubcategory::lists('name', 'id'));
	}


	public function update($id) {
		 $validator = $this->validate(Input::all());
        if($validator)
        	return Redirect::to('admin/items/' . $id)->withErrors($validator)->withInput();

		if (Input::file('icon')) {
			$data = Input::all();
        	$data['icon'] = ProductItem::storeImage(Input::file('icon'));
    	}
        else {
        	$data = Input::only(['name','description','subcategory']);
        }		

        ProductItem::find($id)->fill($data)->save();    
    	return Redirect::to('admin/items/' . $id)->withInput();
	}


	public function destroy($id) {
		ProductItem::find($id)->delete();
		return Redirect::to('admin/items');
	}


	public function unpublish($id) {
		ProductItem::find($id)->unpublish($id);
		return Redirect::to('admin/items');
	}


	public function publish($id) {
		ProductItem::find($id)->publish($id);
		return Redirect::to('admin/items');
	}

}