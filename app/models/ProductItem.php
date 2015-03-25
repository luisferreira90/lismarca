<?php


class ProductItem extends Eloquent{

	protected $fillable = ['subcategory', 'name', 'icon', 'description', 'published'];
	public $timestamps = false;


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