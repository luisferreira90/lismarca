<?php

namespace admin;

use ProductItem;
use ProductSubcategory;
use View;
use Input;
use Validator;
use Redirect;

class ItemsController extends \BaseController {

	private function storeImage() {
		$file = Input::file('icon');
		$destinationPath = public_path().'/images/produtos/icons'; 
		$filename = 'images/produtos/icons/' . $file->getClientOriginalName();
		$upload_success = Input::file('icon')->move($destinationPath, $filename);
		return $filename;
	}

	public function items() {
		$item = new ProductItem;
		$items = $item->listAll(Input::all());
		$subcategory = new ProductSubcategory;
		$subcategories = $subcategory::lists('name', 'id');
  		return View::make('admin.items')->with('items', $items)->with('subcategories', $subcategories);
	}

	public function create(){
		$items = ProductItem::lists('name', 'id');
		return View::make('admin.item-create')->with('items', $items);
	}

	public function store() {
		$data = Input::only(['name','icon','subcategory','description']);
		
		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'description' => 'required',
			'icon' => 'required|image',
			'subcategory' => 'required'
			]);

        if($validator->fails()){
            return Redirect::to('admin/items/criar')->withErrors($validator)->withInput();
        }

        $data['icon'] = $this->storeImage();

        $new = ProductItem::create($data);
        if($new){
            return Redirect::to('admin/items');
        }
	}

	public function edit($id) {
		$item = ProductItems::find($id);
		$subcategories = ProductSubcategory::lists('name', 'id');
		return View::make('admin.item-edit')->with('item', $item)->with('subcategories', $subcategories);
	}

	public function update($id) {
		$data = Input::only(['name','icon','subcategory','description']);
		
		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'description' => 'required',
			'subcategory' => 'required'
		]);

        if($validator->fails()){
            return Redirect::to('admin/items/' . $id)->withErrors($validator)->withInput();
        }

        if (is_null($data['icon']))
        	$data['icon'] = ProductItem::find($id)->icon;
        else
        	$data['icon'] = $this->storeImage();

        $item = ProductItem::find($id);
		$item->fill($data);
		$item->save();
        
    	return Redirect::to('admin/items/' . $id)->withInput();
	}

	public function destroy($id) {

		$item = ProductItem::find($id)->delete();
		return Redirect::to('admin/items');
	}

	public function unpublish($id) {
		$item = ProductItem::find($id)->unpublish($id);
		return Redirect::to('admin/items');
	}

	public function publish($id) {
		$item = ProductItem::find($id)->publish($id);
		return Redirect::to('admin/items');
	}

}
