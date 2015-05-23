<?php


class ProductCategory extends Eloquent{

	protected $table = 'product_categories';
	protected $fillable = ['subsection', 'name', 'icon', 'published', 'ordering'];
	public $timestamps = false;


    public static function storeImage($file) {
        $destinationPath = public_path().'/images/produtos/icons'; 
        $filename = 'images/produtos/icons/' . $file->getClientOriginalName();
        $upload_success = $file->move($destinationPath, $filename);
        return $filename;
    }


    public function subsection() {
        return $this->belongsTo('ProductSubsection');
    }


    public function subcategory() {
        return $this->hasMany('ProductSubcategory', 'category');
    }


    public function item()
    {
        return $this->hasManyThrough('ProductItem', 'ProductSubcategory', 'category', 'subcategory');
    }


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