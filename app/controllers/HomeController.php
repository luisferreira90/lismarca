<?php

class HomeController extends BaseController {

	public function language() 
    {
        $rules = [
        'language' => 'in:en,pt' //list of supported languages of your application.
        ];

        $language = Input::get('lang'); //lang is name of form select field.

        $validator = Validator::make(compact($language),$rules);

        if($validator->passes())
        {
            Session::put('language',$language);
            App::setLocale($language);
            return Redirect::back()->withInput();
        }
    }

}
