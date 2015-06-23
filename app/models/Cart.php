<?php

class Cart extends Eloquent{

	protected $fillable = ['user', 'product_item', 'quantity'];
	public $timestamps = false;
    


	
}