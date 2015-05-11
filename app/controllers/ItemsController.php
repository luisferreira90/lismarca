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
  		return View::make('pages.products')->with('products', $items)->with('subcategories', ProductSubcategory::lists('name', 'id'));
	}

}
