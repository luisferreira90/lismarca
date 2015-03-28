<?php

class PortfolioClient extends Eloquent{

	protected $fillable = ['category', 'name', 'info', 'icon', 'photos','description','published','ordering'];
	public $timestamps = false;


    public function category()
    {
        return $this->belongsTo('PortfolioCategory');
    }


    public static function storeImage($file) {
        $destinationPath = public_path().'/images/produtos/icons'; 
        $filename = 'images/produtos/icons/' . $file->getClientOriginalName();
        $upload_success = $file->move($destinationPath, $filename);
        return $filename;
    }
    

    public function listAll($filter)
    {
        $items = $this->select('id', 'name', 'subcategory', 'published');

        if(isset($filter['subcategory']))
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


    public function publish($id)
    {
        $this->where('id', $id)->update(array('published' => 1));
    }


    public function unpublish($id)
    {
        $this->where('id', $id)->update(array('published' => 0));
    }

}