<?php

class Cart extends Eloquent{

	protected $fillable = ['user', 'product_item', 'quantity'];
	public $timestamps = false;

	public function getUserCart() {
		$id = Auth::id();
		$items = new ProductItem;

		return $this->join('product_items', 'product_items.id', '=', 'carts.product_item')
		->select('carts.product_item', 'carts.quantity','carts.user', 'product_items.name', 'product_items.icon')
		->where('carts.user', '=', $id)
		->get();
	}


	public function submitCart($input) {
		$currentCart = $this->getUserCart();
		$i = 0;
		$finalCart = array();
		$cartModel = new Cart();

		foreach($currentCart as $cart) {
			$cart['quantity'] = $input['quantity'][$i];
			unset($cart['icon']);
			unset($cart['name']);
			$finalCart[] = $cart['attributes'];
			$cartModel->save($cart);
			$i++;
		}




	}

}
