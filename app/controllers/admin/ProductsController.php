<?php

namespace admin;

use ProductSection;
use ProductSubsection;
use ProductCategory;
use ProductSubcategory;
use ProductItem;
use View;

class ProductsController extends \BaseController {

	public function products() {
  		return View::make('admin.products');
	}

	public function categories() {
  		return View::make('admin.categories')->with('categories', ProductCategory::all());
	}

	public function subCategories() {
  		return View::make('admin.subCategories')->with('subCategories', ProductSubcategory::all());
	}

	public function items() {
  		return View::make('admin.items')->with('items', ProductItem::all());
	}

}
