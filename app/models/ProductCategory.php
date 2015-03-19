<?php


class ProductCategory extends Eloquent{

	protected $table = 'product_categories';
	protected $fillable = ['subsection', 'name', 'icon', 'published', 'ordering'];
	public $timestamps = false;

	/**
     * Return categories list
     *
     * @return array
     */
    public function listAll($filter)
    {
    	$category = $this->select('*');

    	if(Input::get('subsection')) 
    		$category = $category->where('subsection', '=', $filter['subsection']);
    	return $category->get();
    }
	
}