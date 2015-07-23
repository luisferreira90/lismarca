<?php

class Order extends Eloquent{

	protected $fillable = ['user', 'product_item', 'quantity', 'datetime', 'treated'];
	public $timestamps = false;

	public function getOrder() {
		
	}

}