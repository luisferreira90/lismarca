<?php

class ProductSubsection extends Eloquent{

	protected $fillable = ['section', 'name', 'icon', 'published', 'ordering'];
	public $timestamps = false;

    public function sections() {
        return $this->belongsTo('ProductSection');
    } 

	/**
     * Return subsection list
     *
     * @return array
     */
    public function listAll($filter)
    {
    	$subsection = $this->select('*');

    	if(Input::get('section')) 
    		$subsection = $subsection->where('section', '=', $filter['section']);
    	return $subsection->get();
    }


    /**
     * Publish subsection
     *
     * @return array
     */
    public function publish($id)
    {
        $this->where('id', $id)->update(array('published' => 1));
    }


    /**
     * Unpublish subsection
     *
     * @return array
     */
    public function unpublish($id)
    {
        $this->where('id', $id)->update(array('published' => 0));
    }
	
}