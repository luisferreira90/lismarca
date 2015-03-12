<?php


class ProductCategory extends Eloquent{

	protected $table = 'product_categories';
	protected $fillable = ['subsection', 'name', 'icon', 'published', 'ordering'];
	
}