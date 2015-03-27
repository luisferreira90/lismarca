<?php


class ProductItem extends Eloquent{

	protected $fillable = ['subcategory', 'name', 'icon', 'description', 'published','new','featured'];
	public $timestamps = false;


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
            //var_dump(Input::all());
            if(isset($filter['subcategory']))
                $items = $items->where('subcategory', '=', $filter['subcategory']);

        $items = $items->orderBy('id', 'desc');
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