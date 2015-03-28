<?php

namespace admin;

use PortfolioClient;
use PortfolioCategory;
use View;
use Input;
use Validator;
use Redirect;

class PortfolioClientsController extends \BaseController {

	private function validate($data) {
		$validator = Validator::make($data, [
			'name' => 'required|min:2',
			'description' => 'required',
			'icon' => 'image',
			'category' => 'required',
			'info' => 'required'
			]);

        if($validator->fails()){
            return $validator;
        }

        return false;
	}


	public function clients() {
		$client = new PortfolioClient;
		$clients = $client->listAll(Input::all());
  		return View::make('admin.portfolioclient')->with('clients', $clients)->with('category', PortfolioCategory::lists('name', 'id'));
	}


	public function create(){
		return View::make('admin.portfolioclient-edit')->with('categories', PortfolioCategory::lists('name', 'id'));
	}


	public function store() {
		$data = Input::all();
		$validator = $this->validate($data);
        if($validator)
            return Redirect::to('admin/portfolio-cliente/criar')->withErrors($validator)->withInput();

        if(isset($data['icon'])) 
        	$data['icon'] = PortfolioClient::storeImage(Input::file('icon'));

        $new = PortfolioClient::create($data);
        if($new){
            return Redirect::to('admin/portfolio-cliente');
        }
	}


	public function edit($id) {
		return View::make('admin.portfolioclient-edit')->with('client', PortfolioClient::find($id))->with('categories', PortfolioCategory::lists('name', 'id'));
	}


	public function update($id) {
	 	$validator = $this->validate(Input::all());
        if($validator)
        	return Redirect::to('admin/portfolio-cliente/' . $id)->withErrors($validator)->withInput();

		if (Input::file('icon')) {
			$data = Input::all();
        	$data['icon'] = PortfolioClient::storeImage(Input::file('icon'));
    	}
        else {
        	$data = Input::only(['name','description','category','info','photos','ordering']);
        }

        PortfolioClient::find($id)->fill($data)->save();    
    	return Redirect::to('admin/portfolio-cliente/' . $id)->withInput();
	}


	public function destroy($id) {
		PortfolioClient::find($id)->delete();
		return Redirect::to('admin/portfolio-cliente');
	}


	public function unpublish($id) {
		PortfolioClient::find($id)->unpublish($id);
		return Redirect::to('admin/portfolio-cliente');
	}


	public function publish($id) {
		PortfolioClient::find($id)->publish($id);
		return Redirect::to('admin/portfolio-cliente');
	}

}