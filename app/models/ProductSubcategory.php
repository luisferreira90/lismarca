<?php


class ProductSubcategory extends Eloquent{

	protected $table = 'product_subcategories';
	protected $fillable = ['category', 'name', 'icon', 'published', 'ordering'];
	
}