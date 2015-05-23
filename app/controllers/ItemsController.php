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
			$view = $view->with('subsections', ProductSubsection::lists('name', 'id'));
		}

		if(isset($filter['subsection']) && $filter['subsection'] != '') {
			$view = $view->with('categories', ProductCategory::lists('name', 'id'));
		}

		if(isset($filter['category']) && $filter['category'] != '') {
			$view = $view->with('subcategories', ProductSubcategory::lists('name', 'id'));
		}

  		return $view;
	}

}
