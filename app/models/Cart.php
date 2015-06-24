<?php

class Cart extends Eloquent{

	protected $fillable = ['user', 'product_item', 'quantity'];
	public $timestamps = false;

	public function getUserCart() {
		$id = Auth::id();
		return $this->select('product_item', 'quantity','user')->where('user', '=', $id)->get();
	}

}