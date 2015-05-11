<?php

class ProductItem extends Eloquent{

	protected $fillable = ['subcategory', 'name', 'icon', 'description', 'published','new','featured'];
	public $timestamps = false;


    public function subcategory()
    {
        return $this->belongsTo('ProductSubcategory');
    }


    public static function storeImage($file) {
        $destinationPath = public_path().'/images/produtos/icons/'; 
        $filename = $file->getClientOriginalName();
        Image::make($file)->resize(400, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . $filename);
        
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

        if(isset($filter['subcategory']) && $filter['subcategory'] != '')
            $items = $items->where('subcategory', '=', $filter['subcategory']);

        if(isset($filter['order']))
            $items = $items->orderBy($filter['order'], 'asc');

        $items = $items->orderBy('id', 'desc');

        //$item = ProductItem::whereId($id)->first();
    
        //echo ProductSubcategory::find($item->subcategory)->name; die();

        //$items = $items->orderBy('id', 'desc');
        return $items->paginate(15);
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