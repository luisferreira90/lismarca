<?php

class ProductSection extends Eloquent {

	protected $fillable = ['name', 'icon', 'published', 'ordering'];
	public $timestamps = false;

	public function subsections() {
		return $this->hasMany('ProductSubsection');
   	}

   	/**
     * Publish section
     *
     * @return array
     */
    public function publish($id)
    {
        $this->where('id', $id)->update(array('published' => 1));
    }


    /**
     * Unpublish section
     *
     * @return array
     */
    public function unpublish($id)
    {
        $this->where('id', $id)->update(array('published' => 0));
    }
	
}