<?php

class ProductPhoto extends Eloquent{

	protected $fillable = ['src', 'product_item'];
	public $timestamps = false;


    public function productItem()
    {
        return $this->belongsTo('ProductItem');
    }


    public function getPhotos($id) {
        $photos = $this->select('id', 'src', 'product_item')->where('product_item', '=', $id)->get();
        return $photos;
    }

    public static function storeImage($file, $id) {
        $destinationPath = public_path().'/images/produtos/items'; 
        $filename = $id . '-' . $file->getClientOriginalName();
        Image::make($file)->resize(290, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/thumbnails/' . $filename);
        $file->move($destinationPath, $filename);
        
        return $filename;
    }

}