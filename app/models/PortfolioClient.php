<?php

class PortfolioClient extends Eloquent{

	protected $fillable = ['category', 'name', 'info', 'icon', 'description','published','ordering'];
	public $timestamps = false;


    public function category()
    {
        return $this->belongsTo('PortfolioCategory');
    }


    public static function storeImage($file) {
        $destinationPath = public_path().'/images/portfolio/icons/'; 
        $filename = $file->getClientOriginalName();
        Image::make($file)->resize(400, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . $filename);
        
        return $filename;
    }
    

    public function listAll($filter)
    {
        $items = $this->select('id', 'name', 'category', 'published');

        if(isset($filter['category']) && $filter['category'] != '')
            $items = $items->where('category', '=', $filter['category']);

        $items->orderBy('id', 'desc');

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