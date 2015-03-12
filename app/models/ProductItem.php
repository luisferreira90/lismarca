<?php


class ProductItem extends Eloquent{

	protected $fillable = [
							'section', 'subsection', 'category', 
							'subcategory', 'name', 'icon', 'description', 
							'added', 'published', 'ordering'
						  ];
	
}