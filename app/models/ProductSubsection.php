<?php

class ProductSubsection extends Eloquent{

	protected $fillable = ['section', 'name', 'icon', 'published', 'ordering'];
	public $timestamps = false;

    public function sections() {
        return $this->belongsTo('ProductSection');
    } 

	/**
     * Return user list
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
	
}