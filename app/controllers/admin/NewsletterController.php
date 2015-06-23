<?php

namespace admin;

use View;

class NewsletterController extends \BaseController {

	public function edit() {
  		return View::make('admin.newsletter');
	}

	public function send() {
  		return View::make('admin.newsletter');
	}

}
