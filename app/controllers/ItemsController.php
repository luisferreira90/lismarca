<?php

/*use ProductItem;
use ProductSubcategory;
use ProductPhoto;
use View;
use Input;
use Validator;
use Redirect;*/

class ItemsController extends BaseController {

	public function items() {

		$en = '';
		if (App::getLocale() == 'en') {
			$en = '_en';
			$name = 'name_en';
		}
		else {
			$name = 'name';
		}

		$item = new ProductItem;
		$items = $item->listAll(Input::all());

		$view = View::make('pages.products')
		->with('products', $items)
		->with('sections', ProductSection::lists('name' . $en, 'id'));

		if(Input::has('section') && Input::has('subsection') && Input::has('category')) {
			$subcategory = new ProductSubcategory;
			$subcategories = $subcategory->where('category', '=', Input::get('category'))->lists('name' . $en, 'id');
			$view = $view->with('subcategories', $subcategories);	
		}
		if(Input::has('section') && Input::has('subsection')) {
			$category = new ProductCategory;
			$categories = $category->where('subsection', '=', Input::get('subsection'))->lists('name' . $en, 'id');
			$view = $view->with('categories', $categories);
		}
		else if(Input::has('section')) {
			$title = ProductSection::find(Input::get('section'))->name;
			$subsection = new ProductSubsection;
			$subsections = $subsection->where('section', '=', Input::get('section'))->lists('name' . $en, 'id');
			$view = $view->with('subsections', $subsections)->with('title', $title);

			$subsections = ProductSubsection::select($name . ' as name', 'id', 'icon', 'section')
			->where('section', '=', Input::get('section'))->get();

			$view = View::make('pages.products_landing_subsection')
			->with('subsections', $subsections)->with('section', Input::get('section'));
		}
		else {
			$sections = ProductSection::select($name . ' as name', 'id', 'icon')->get();

			$view = View::make('pages.products_landing')
			->with('sections', $sections);
		}


        $new = $item->where('new', '=', '1')->orderBy('id', 'desc')->skip(0)->take(15)->get();

        if(Input::has('search')) {
			$searchView = View::make('pages.products')
			->with('products', $items)
			->with('new', $new);
			return $searchView;
		}

  		return $view->with('new', $new);
	}


	public function item($id) {
		$product = ProductItem::find($id);
		if(!$product) {
			return View::make('pages.product')->with('error', 'Produto não encontrado!');
		}
		$productPhoto = new ProductPhoto;
		$photos = $productPhoto->getPhotos($id);
		return View::make('pages.product')->with('product', $product)->with('photos', $photos);
	}

}
