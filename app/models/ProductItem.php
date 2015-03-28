<?php


class ProductItem extends Eloquent{

	protected $fillable = ['subcategory', 'name', 'icon', 'description', 'published','new','featured'];
	public $timestamps = false;


    public function subcategory()
    {
        return $this->belongsTo('ProductSubcategory');
    }


    public static function storeImage($file) {
        $destinationPath = public_path().'/images/produtos/icons'; 
        $filename = 'images/produtos/icons/' . $file->getClientOriginalName();
        $upload_success = $file->move($destinationPath, $filename);
        return $filename;
    }
    

    /**
     * Return item list
     *
     * @return array
     */
    public function listAll($filter)
    {
        $items = $this->select('id', 'name', 'subcategory', 'published');

        if(isset($filter['subcategory']) && $filter['subcategory'] != '')
            $items = $items->where('subcategory', '=', $filter['subcategory']);

        if(isset($filter['order']))
            $items = $items->orderBy($filter['order'], 'asc');

        if(isset($filter['order']) && $filter['order'] == 'subcategory')
            $items = $items->orderBy('subcategory', 'asc');

        //$item = ProductItem::whereId($id)->first();
    
        //echo ProductSubcategory::find($item->subcategory)->name; die();

        //$items = $items->orderBy('id', 'desc');
        return $items->paginate(25);
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