<?php

namespace admin;

use View;
use Input;
use Validator;
use Redirect;
use ProductPhoto;

class ProductPhotosController extends \BaseController {

	public function destroy($id) {
		ProductPhoto::find($id)->delete();
		return Redirect::back();
	}

}