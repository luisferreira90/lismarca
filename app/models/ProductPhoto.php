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
        $filename = $id . '-' . $file->getClientOriginalName();
        Image::make($file)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/thumbnails/' . $filename);
        $file->move($destinationPath, $filename);
        
        return $filename;
    }

}