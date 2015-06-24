<?php

class CartsController extends BaseController {

	public function store() {

		DB::statement('
			INSERT INTO carts (product_item, quantity, user) 
			VALUES (' .
			Input::get('product_item') . ','.
			Input::get('quantity') . ',' .
			Input::get('user') . ') ON DUPLICATE KEY UPDATE quantity = ' . Input::get('quantity')
			);
		return Redirect::back()->withInput();
	}


	public function checkout() {
		$carts = new Cart;
		$items = new ProductItem;
		$cart = $carts->getUserCart();
		$item = $items->getItems($cart);
		return View::make('pages/checkout')->with('cart',$cart)->with('item', $item);
	}

}
