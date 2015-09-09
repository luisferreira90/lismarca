<?php

namespace admin;

use ProductItem;
use ProductSubcategory;
use ProductCategory;
use ProductSubsection;
use ProductSection;
use ProductPhoto;
use View;
use Input;
use Validator;
use Redirect;

class ItemsController extends \BaseController {

	private function validate($data) {
		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'description' => 'required',
			'description_en' => 'required',
			'icon' => 'image'
			]);

		$images_validator = true;

        if($validator->fails()){
            return $validator;
        }

        return false;
	}


	public function items() {
		$item = new ProductItem;
		$items = $item->listAll(Input::all());
  		$view = View::make('admin.item')->with('items', $items)
  		->with('sections', ProductSection::lists('name', 'id'));

		if(Input::has('section') && Input::has('subsection') && Input::has('category')) {
			$subcategory = new ProductSubcategory;
			$subcategories = $subcategory->where('category', '=', Input::get('category'))->lists('name', 'id');
			$view = $view->with('subcategories', $subcategories);	
		}

		if(Input::has('section') && Input::has('subsection')) {
			$category = new ProductCategory;
			$categories = $category->where('subsection', '=', Input::get('subsection'))->lists('name', 'id');
			$view = $view->with('categories', $categories);
		}

		if(Input::has('section')) {
			$subsection = new ProductSubsection;
			$subsections = $subsection->where('section', '=', Input::get('section'))->lists('name', 'id');
			$view = $view->with('subsections', $subsections);
		}

  		return $view;
	}


	public function create(){
		return View::make('admin.item-edit')->with('subcategories', ProductSubcategory::lists('name', 'id'));
	}


	public function store() {
		$data = Input::all();
		$validator = $this->validate($data);
        if($validator)
            return Redirect::to('admin/items/criar')->withErrors($validator)->withInput();

        if (!Input::has('new'))
        	$data['new'] = 0;

        if (!Input::has('featured'))
        	$data['featured'] = 0; 

		if(isset($data['icon'])) 
        	$data['icon'] = ProductItem::storeImage(Input::file('icon'));

        if(isset($data['colors'])) 
        	$data['colors'] = ProductItem::storeColor(Input::file('colors'));

        if(isset($data['dimensions'])) 
        	$data['dimensions'] = ProductItem::storeDimensions(Input::file('dimensions'));

     	$category = ProductSubcategory::find(Input::get('subcategory'))->category;
    	$subsection = ProductCategory::find($category)->subsection;
    	$section = ProductSubsection::find($subsection)->section;
    	$data['category'] = $category;
    	$data['subsection'] = $subsection;
    	$data['section'] = $section;

        $new = ProductItem::create($data);

        if(isset($data['pdf'])) 
        	$data['pdf'] = ProductItem::storeFile(Input::file('pdf'), $new->id);

        if(isset($data['images']) && !empty($data['images'][0])) {

	        $files = Input::file('images');

			foreach($files as $file) {
			    $rules = array(
			       'file' => 'required|mimes:png,gif,jpeg'
			    );
			    $validator = Validator::make(array('file'=> $file), $rules);
			    if($validator->passes()){
			    	$src = ProductPhoto::storeImage($file, $new->id);
			    	ProductPhoto::create(array('src' => $src, 'product_item' => $new->id));
			    } else {
			        return Redirect::back()->with('error', 'O campo imagens apenas suporta os formatos GIF, PNG e JPEG');
			    }
			}
        }

        if($new){
            return Redirect::to('admin/items/' . $new->id);
        }
	}


	public function edit($id) {
		$productPhoto = new ProductPhoto;
		$photos = $productPhoto->where('product_item', '=', $id)->get();
		return View::make('admin.item-edit')
		->with('item', ProductItem::find($id))
		->with('subcategories', ProductSubcategory::lists('name', 'id'))
		->with('photos', $photos);
	}


	public function update($id) {
	 	$validator = $this->validate(Input::all());
        if($validator)
        	return Redirect::to('admin/items/' . $id)->withErrors($validator)->withInput();

		$data = Input::all();

		if (Input::file('icon')) {
        	$data['icon'] = ProductItem::storeImage(Input::file('icon'));
    	}

    	if(Input::file('colors')) 
        	$data['colors'] = ProductItem::storeColor(Input::file('colors'));

        if(Input::file('dimensions')) 
        	$data['dimensions'] = ProductItem::storeDimensions(Input::file('dimensions'));


        if (!Input::has('new'))
        	$data['new'] = 0;

        if (!Input::has('featured'))
        	$data['featured'] = 0;

    	if(isset($data['pdf'])) 
    		$data['pdf'] = ProductItem::storeFile(Input::file('pdf'), $id);	

		if(isset($data['images']) && !empty($data['images'][0])) {
			$files = Input::file('images');

			foreach($files as $file) {
			    $rules = array(
			       'file' => 'required|mimes:png,gif,jpeg'
			    );
			    $validator = Validator::make(array('file'=> $file), $rules);
			    if($validator->passes()){
			    	$src = ProductPhoto::storeImage($file, $id);
			    	ProductPhoto::create(array('src' => $src, 'product_item' => $id));
			    } else {
			        return Redirect::back()->with('error', 'O campo imagens apenas suporta os formatos GIF, PNG e JPEG');
			    }
			}	
		}

		$category = ProductSubcategory::find(Input::get('subcategory'))->category;
    	$subsection = ProductCategory::find($category)->subsection;
    	$section = ProductSubsection::find($subsection)->section;
    	$data['category'] = $category;
    	$data['subsection'] = $subsection;
    	$data['section'] = $section;

        ProductItem::find($id)->fill($data)->save();    
    	return Redirect::to('admin/items/' . $id);
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