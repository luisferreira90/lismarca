<?php

class OrderItem extends Eloquent{

	protected $fillable = ['order_id', 'product_item', 'quantity'];
	public $timestamps = false;

	public function getOrderItem() {
		
	}

}