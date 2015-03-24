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

    /**
     * Publish subcategory
     *
     * @return array
     */
    public function publish($id)
    {
        $this->where('id', $id)->update(array('published' => 1));
    }


    /**
     * Unpublish subcategory
     *
     * @return array
     */
    public function unpublish($id)
    {
        $this->where('id', $id)->update(array('published' => 0));
    }
	
}