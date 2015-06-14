<?php

class PortfolioController extends BaseController {

	public function portfolios() {
		$portfolio = new PortfolioClient;
		$portfolios = $portfolio->listAll(Input::all());

		$view = View::make('pages.portfolios')
		->with('portfolios', $portfolios)
		->with('categories', PortfolioCategory::lists('name', 'id'));

  		return $view;
	}

	public function portfolio($id) {
		$portfolio = PortfolioClient::find($id);
		if(!$portfolio) {
			return View::make('pages.portfolio')->with('error', 'Item não encontrado!');
		}
		$portfolioPhoto = new PortfolioPhoto;
		$photos = $portfolioPhoto->getPhotos($id);
		return View::make('pages.portfolio')->with('portfolio', $portfolio)->with('photos', $photos);
	}

}
