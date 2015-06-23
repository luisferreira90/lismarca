<?php

class CartsController extends BaseController {

	public function store() {
		$data = Input::all();
		$new = Cart::create($data);
		return Redirect::back()->withInput();
	}

}
