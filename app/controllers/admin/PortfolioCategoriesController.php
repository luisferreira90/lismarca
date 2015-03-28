<?php

namespace admin;

use PortfolioCategory;
use View;
use Input;
use Validator;
use Redirect;

class PortfolioCategoriesController extends \BaseController {

	private function validate($data) {
		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'ordering' => 'numeric',
			]);

        if($validator->fails()){
            return $validator;
        }

        return false;
	}
	

	public function categories() {
  		return View::make('admin.portfoliocategory')->with('categories', PortfolioCategory::all());
	}


	public function create(){
		return View::make('admin.portfoliocategory-edit');
	}


	public function store() {
		$data = Input::all();
		$validator = $this->validate($data);
        if($validator)
        	return Redirect::to('admin/portfolio-categoria/criar')->withErrors($validator)->withInput();

        $new = PortfolioCategory::create($data);
        if($new){
            return Redirect::to('admin/portfolio-categoria');
        }
	}


	public function edit($id) {
		return View::make('admin.portfoliocategory-edit')->with('category', PortfolioCategory::find($id));
	}


	public function update($id) {
        $validator = $this->validate(Input::all());
        if($validator)
        	return Redirect::to('admin/portfolio-categoria/' . $id)->withErrors($validator)->withInput();		

        PortfolioCategory::find($id)->fill(Input::all())->save();
    	return Redirect::to('admin/portfolio-categoria/' . $id)->withInput();      
	}


	public function destroy($id) {
		PortfolioCategory::find($id)->delete();
		return Redirect::to('admin/portfolio-categoria');
	}


	public function unpublish($id) {
		PortfolioCategory::find($id)->unpublish($id);
		return Redirect::to('admin/portfolio-categoria');
	}


	public function publish($id) {
		PortfolioCategory::find($id)->publish($id);
		return Redirect::to('admin/portfolio-categoria');
	}

}