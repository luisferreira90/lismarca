<?php

namespace admin;

use Redirect;
use PortfolioPhoto;

class PortfolioPhotosController extends \BaseController {

	public function destroy($id) {
		PortfolioPhoto::find($id)->delete();
		return Redirect::back();
	}

}