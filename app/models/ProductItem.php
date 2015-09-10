<?php

class ProductItem extends Eloquent{

	protected $fillable = ['section','subsection','category','subcategory', 'name', 'icon', 'description', 'description_en', 'published','new','featured', 'colors', 'dimensions'];
	public $timestamps = false;


    public function subcategory()
    {
        return $this->belongsTo('ProductSubcategory', 'subcategory');
    }


    public static function storeImage($file) {
        $destinationPath = public_path().'/images/produtos/icons/'; 
        $filename = $file->getClientOriginalName();
        Image::make($file)->resize(290, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . $filename);
        
        return $filename;
    }


    public static function storeColors($file) {
        $destinationPath = public_path().'/images/produtos/colors/'; 
        $filename = $file->getClientOriginalName();
        Image::make($file)->save($destinationPath . $filename);
        
        return $filename;
    }


    public static function storeDimensions($file) {
        $destinationPath = public_path().'/images/produtos/dimensions/'; 
        $filename = $file->getClientOriginalName();
        Image::make($file)->save($destinationPath . $filename);
        
        return $filename;
    }


    public static function storeFile($file, $id) {
        $destinationPath = public_path().'/pdf/'; 
        $filename = $id . '.pdf';
        $file->move($destinationPath, $filename);
        return $filename;
    }

    

    /**
     * Return item list
     *
     * @return array
     */
    public function listAll($filter)
    {
        $items = $this->select('id', 'name', 'subcategory', 'published', 'icon');

        if(Input::has('search')) {
            $items = $items->where('name', 'LIKE', '%' . Input::get('search') . '%');
        }

        if(Input::has('section') && Input::has('subsection') && Input::has('category') && Input::has('subcategory'))
            $items = $items->where('subcategory', '=', Input::get('subcategory'));
        else if(Input::has('section') && Input::has('subsection') && Input::has('category'))
            $items = $items->where('category', '=', Input::get('category'));
        else if(Input::has('section') && Input::has('subsection'))
            $items = $items->where('subsection', '=', Input::get('subsection'));
        else if(Input::has('section'))
            $items = $items->where('section', '=', Input::get('section'));
        else
            $items = $items;
        
        return $items->orderBy('id', 'desc')->paginate(18);
    }

	
	/**
     * Publish item
     *
     * @return array
     */
    public function publish($id)
    {
        $this->where('id', $id)->update(array('published' => 1));
    }


    /**
     * Unpublish item
     *
     * @return array
     */
    public function unpublish($id)
    {
        $this->where('id', $id)->update(array('published' => 0));
    }

}