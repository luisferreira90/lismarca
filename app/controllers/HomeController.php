<?php

class HomeController extends BaseController {

	public function language() {
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

    public function homepage() {
        $productItem = new ProductItem;
        $new = $productItem->where('new', '=', '1')->orderBy('id', 'desc')->skip(0)->take(15)->get();
        $featured = $productItem->where('featured', '=', '1')->orderBy('id', 'desc')->skip(0)->take(15)->get();
        return View::make('pages/home')->with('new', $new)->with('featured', $featured);
    }

}
