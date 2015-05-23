<?php

class ProductSubsection extends Eloquent{

	protected $fillable = ['section', 'name', 'icon', 'published', 'ordering'];
	public $timestamps = false;


    public function section() {
        return $this->belongsTo('ProductSection');
    }


    public function category() {
        return $this->hasMany('ProductCategory', 'subsection');
    }


    public function subcategory()
    {
        return $this->hasManyThrough('ProductSubcategory', 'ProductCategory', 'subsection', 'category');
    } 


    public static function storeImage($file) {
        $destinationPath = public_path().'/images/produtos/icons'; 
        $filename = 'images/produtos/icons/' . $file->getClientOriginalName();
        $upload_success = $file->move($destinationPath, $filename);
        return $filename;
    }
    

	/**
     * Return subsection list
     *
     * @return array
     */
    public function listAll($filter)
    {
    	$subsection = $this->select('*');

    	if(Input::get('section')) 
    		$subsection = $subsection->where('section', '=', $filter['section']);
    	return $subsection->get();
    }


    /**
     * Publish subsection
     *
     * @return array
     */
    public function publish($id)
    {
        $this->where('id', $id)->update(array('published' => 1));
    }


    /**
     * Unpublish subsection
     *
     * @return array
     */
    public function unpublish($id)
    {
        $this->where('id', $id)->update(array('published' => 0));
    }
	
}