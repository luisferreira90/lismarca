<?php

class PortfolioCategory extends Eloquent {

    protected $table = 'portfolio_categories';
	protected $fillable = ['name', 'published', 'ordering'];
	public $timestamps = false;


	public function clients() {
		return $this->hasMany('PortfolioClient');
   	}


    public static function storeImage($file) {
        $destinationPath = public_path().'/images/produtos/icons'; 
        $filename = 'images/produtos/icons/' . $file->getClientOriginalName();
        $upload_success = $file->move($destinationPath, $filename);
        return $filename;
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