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
		$cart = $carts->getUserCart();

		return View::make('pages/checkout')->with('cart',$cart);
	}


	public function submit() {
		var_dump(Input::all());die();
	}

	public function delete($id) {;
		DB::table('carts')->where('product_item', '=', $id)->where('user', '=', Auth::id())->delete();
		return Redirect::route('checkout');
	}

}
