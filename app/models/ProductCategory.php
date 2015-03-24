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

    /**
     * Publish category
     *
     * @return array
     */
    public function publish($id)
    {
        $this->where('id', $id)->update(array('published' => 1));
    }


    /**
     * Unpublish category
     *
     * @return array
     */
    public function unpublish($id)
    {
        $this->where('id', $id)->update(array('published' => 0));
    }
	
}