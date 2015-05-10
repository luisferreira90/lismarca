<?php

class PortfolioPhoto extends Eloquent{

	protected $fillable = ['src', 'portfolio_client'];
	public $timestamps = false;


    public function portfolioClient()
    {
        return $this->belongsTo('PortfolioClient');
    }

    public static function storeImage($file, $id) {
        $destinationPath = public_path().'/images/portfolio/clients'; 
        $filename = $id . '-' . $file->getClientOriginalName();
        Image::make($file)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/thumbnails/' . $filename);
        $file->move($destinationPath, $filename);
        
        return $filename;
    }

}