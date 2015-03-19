<?php


class ProductSubcategory extends Eloquent{

	protected $table = 'product_subcategories';
	protected $fillable = ['category', 'name', 'icon', 'published', 'ordering'];
	public $timestamps = false;

	/**
     * Return subcategories list
     *
     * @return array
     */
    public function listAll($filter)
    {
    	$subcategory = $this->select('*');

    	if(Input::get('category')) 
    		$subcategory = $subcategory->where('category', '=', $filter['category']);
    	return $subcategory->get();
    }
	
}