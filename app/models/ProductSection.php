<?php

class ProductSection extends Eloquent {

	protected $fillable = ['name', 'icon', 'published', 'ordering'];
	public $timestamps = false;

	public function subsections() {
		return $this->hasMany('ProductSubsection');
   	}
	
}