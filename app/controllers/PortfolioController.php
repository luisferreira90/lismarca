<?php

class PortfolioController extends BaseController {

	public function portfolios() {
		$portfolio = new PortfolioClient;
		$portfolios = $portfolio->listAll(Input::all());

		$view = View::make('pages.portfolio')
		->with('portfolios', $portfolios)
		->with('categories', PortfolioCategory::lists('name', 'id'));

  		return $view;
	}

}
