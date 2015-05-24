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

		$filter = Input::all();

		$view = View::make('pages.products')
		->with('products', $items)
		->with('sections', ProductSection::lists('name', 'id'))
		->withInput(Input::all());

		if(isset($filter['section']) && $filter['section'] != '') {
			$subsection = new ProductSubsection;
			$subsections = $subsection->where('section', '=', $filter['section'])->lists('name', 'id');
			$view = $view->with('subsections', $subsections);
		}

		if(isset($filter['subsection']) && $filter['subsection'] != '') {
			$category = new ProductCategory;
			$categories = $category->where('subsection', '=', $filter['subsection'])->lists('name', 'id');
			$view = $view->with('categories', $categories);
		}

		if(isset($filter['category']) && $filter['category'] != '') {
			$subcategory = new ProductSubcategory;
			$subcategories = $subcategory->where('category', '=', $filter['category'])->lists('name', 'id');
			$view = $view->with('subcategories', $subcategories);
		}

  		return $view;
	}

}
