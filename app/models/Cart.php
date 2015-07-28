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

		foreach($currentCart as $cart) {
			$cart['quantity'] = $input['quantity'][$i];
			$finalCart[] = $cart;
			unset($cart['icon']);
			$i++;
		}

		DB::transaction(function($finalCart) use ($finalCart)
		{
			$order = new Order;
			$order->user = Auth::id();
		    $order->save();
	    	$insertedId = $order->id;

			foreach($finalCart as $cart) {
				DB::table('order_items')->insert(
				    array(
				    	'order_id' => $insertedId, 
				    	'product_item' => $cart['product_item'],
				    	'quantity' => $cart['quantity']
				    	)
				);
			}

			Cart::where('user', '=', Auth::id())->delete();
			
		});
			

		Mail::send('pages.order', array('cart' => $finalCart), function($message) {
            	$message->to('lismarca.localhost@gmail.com', Input::get('name'))->subject('Pedido de orçamento');
        });


	}

}
