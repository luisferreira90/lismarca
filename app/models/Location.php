<?php

class Location extends Eloquent {

	protected $fillable = ['name'];
	public $timestamps = false;

	public function name() {
		return $this->select('id', 'name')->get();
	}
	
}