<?php

class Cart extends Eloquent{

	protected $fillable = ['user', 'product_item', 'quantity'];
	public $timestamps = false;

	public function getUserCart() {
		$id = Auth::id();
		$items = new ProductItem;

		return $this->join('product_items', 'product_items.id', '=', 'carts.product_item')
		->select('carts.product_item', 'carts.quantity','carts.user', 'product_items.name', 'product_items.icon', 'product_items.id')
		->where('carts.user', '=', $id)
		->get();
	}

}
