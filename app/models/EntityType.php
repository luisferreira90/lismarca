<?php


class EntityType extends Eloquent{

	protected $fillable = ['name_pt', 'name_en'];

	public function name() {
		return $this->select('id', 'name_pt', 'name_en')->get();
	}

	public function user() {
        return $this->hasMany('User');
    }
	
}