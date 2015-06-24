<?php

namespace admin;

use View;
use Redirect;
use Input;
use Mail;
use \User;

class NewsletterController extends \BaseController {

	public function edit() {
  		return View::make('admin.newsletter');
	}

	public function send() {
		$users = new User;
		$sendTo = $users->newsletterUsers();
		$emails = array();
		foreach($sendTo as $email) {
			$emails[] = $email->email;
		}

		Mail::send('admin.newsletter-send', array('msg' => Input::get('description')), function($message) use ($emails)
		{    
		    $message->bcc($emails)->subject('Lismarca - Newsletter');    
		});

		if( count(Mail::failures()) > 0 ) {

		   echo "Erro no envio de uma ou mais mensagens:";

		   foreach(Mail::failures as $email_address) {
		       echo " - $email_address <br />";
		    }

		} else {
		    return Redirect::to('admin');
		}

	}

}