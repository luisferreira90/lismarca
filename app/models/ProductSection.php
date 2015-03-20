<?php

class ProductSection extends Eloquent {

	protected $fillable = ['name', 'icon', 'published', 'order'];
	public $timestamps = false;

	public function subsections() {
		return $this->hasMany('ProductSubsection');
   	}
	
}