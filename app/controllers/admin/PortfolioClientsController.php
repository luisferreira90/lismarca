<?php

namespace admin;

use PortfolioClient;
use PortfolioCategory;
use PortfolioPhoto;
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

        if(isset($data['images']) && !empty($data['images'][0])) {

	        $files = Input::file('images');

			foreach($files as $file) {
			    $rules = array(
			       'file' => 'required|mimes:png,gif,jpeg'
			    );
			    $validator = Validator::make(array('file'=> $file), $rules);
			    if($validator->passes()){
			    	$src = PortfolioPhoto::storeImage($file, $new->id);
			    	PortfolioPhoto::create(array('src' => $src, 'portfolio_client' => $new->id));
			    } else {
			        return Redirect::back()->with('error', 'O campo imagens apenas suporta os formatos GIF, PNG e JPEG');
			    }
			}
        }

        if($new){
            return Redirect::to('admin/portfolio-cliente/' . $new->id);
        }
	}


	public function edit($id) {
		$portfolioPhoto = new PortfolioPhoto;
		$photos = $portfolioPhoto->where('portfolio_client', '=', $id)->get();
		return View::make('admin.portfolioclient-edit')
		->with('client', PortfolioClient::find($id))
		->with('categories', PortfolioCategory::lists('name', 'id'))
		->with('photos', $photos);
	}


	public function update($id) {
	 	$validator = $this->validate(Input::all());
        if($validator)
        	return Redirect::to('admin/portfolio-cliente/' . $id)->withErrors($validator)->withInput();

        $data = Input::all();

		if (Input::file('icon')) {
        	$data['icon'] = PortfolioClient::storeImage(Input::file('icon'));
    	}

    	if(isset($data['images']) && !empty($data['images'][0])) {

	        $files = Input::file('images');

			foreach($files as $file) {
			    $rules = array(
			       'file' => 'required|mimes:png,gif,jpeg'
			    );
			    $validator = Validator::make(array('file'=> $file), $rules);
			    if($validator->passes()){
			    	$src = PortfolioPhoto::storeImage($file, $new->id);
			    	PortfolioPhoto::create(array('src' => $src, 'portfolio_client' => $new->id));
			    } else {
			        return Redirect::back()->with('error', 'O campo imagens apenas suporta os formatos GIF, PNG e JPEG');
			    }
			}
        }

        PortfolioClient::find($id)->fill($data)->save();    
    	return Redirect::to('admin/portfolio-cliente/' . $id);
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