<?php

class ProductSection extends Eloquent {

	protected $fillable = ['name', 'icon', 'published', 'ordering'];
	public $timestamps = false;


	public function subsection() {
		return $this->hasMany('ProductSubsection', 'section');
   	}


    public function category()
    {
        return $this->hasManyThrough('ProductCategory', 'ProductSubsection', 'section', 'subsection');
    }


    public static function storeImage($file) {
        $destinationPath = public_path().'/images/produtos/icons'; 
        $filename = 'images/produtos/icons/' . $file->getClientOriginalName();
        $upload_success = $file->move($destinationPath, $filename);
        return $filename;
    }


   	/**
     * Publish section
     *
     * @return array
     */
    public function publish($id)
    {
        $this->where('id', $id)->update(array('published' => 1));
    }


    /**
     * Unpublish section
     *
     * @return array
     */
    public function unpublish($id)
    {
        $this->where('id', $id)->update(array('published' => 0));
    }
	
}