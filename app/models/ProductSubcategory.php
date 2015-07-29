<?php


class ProductSubcategory extends Eloquent{

	protected $table = 'product_subcategories';
	protected $fillable = ['category', 'name', 'name_en', 'icon', 'published', 'ordering'];
	public $timestamps = false;


    public function category() {
        return $this->belongsTo('ProductCategory', 'category');
    }


    public function item()
    {
        return $this->hasMany('ProductItem', 'subcategory');
    }


    public static function storeImage($file) {
        $destinationPath = public_path().'/images/produtos/icons'; 
        $filename = 'images/produtos/icons/' . $file->getClientOriginalName();
        $upload_success = $file->move($destinationPath, $filename);
        return $filename;
    }


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