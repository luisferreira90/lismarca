<?php

/*use ProductItem;
use ProductSubcategory;
use ProductPhoto;
use View;
use Input;
use Validator;
use Redirect;*/

class ItemsController extends BaseController {

	public function items() {
		$item = new ProductItem;
		$items = $item->listAll(Input::all());

		$view = View::make('pages.products')
		->with('products', $items)
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
			$title = ProductSection::find(Input::get('section'))->name;
			$subsection = new ProductSubsection;
			$subsections = $subsection->where('section', '=', Input::get('section'))->lists('name', 'id');
			$view = $view->with('subsections', $subsections)->with('title', $title);
		}

  		return $view;
	}


	public function item($id) {
		$product = ProductItem::find($id);
		if(!$product) {
			return View::make('pages.product')->with('error', 'Produto não encontrado!');
		}
		return View::make('pages.product')->with('product', $product);
	}

}
