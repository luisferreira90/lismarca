<?php

class ProductPhoto extends Eloquent{

	protected $fillable = ['src', 'product_item'];
	public $timestamps = false;


    public function productItem()
    {
        return $this->belongsTo('ProductItem');
    }

    public static function storeImage($file, $id) {
        $destinationPath = public_path().'/images/produtos/items'; 
        Image::make($file)->resize(300, 200)->save($destinationPath . '/thumbnails');
        $filename = $id . '-' . $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        
        return $filename;
    }

}