<?php

Route::get('/', function()
{
	return View::make('pages/home');
});

Route::get('registo', array('as' => 'registo', 'uses' => 'UsersController@registration'));

Route::get('login', array('as' => 'login', 'uses' => 'UsersController@login'));

Route::post('/login', array('as' => 'login', 'uses' => 'UsersController@handleLogin'));

Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));

Route::get('/profile', array('as' => 'profile', 'uses' => 'UsersController@profile'));

Route::resource('user', 'UsersController'); 

Route::get('language', array('uses' => 'HomeController@language'));


/* ########## Administration panel routes ########## */

Route::group(array('namespace' => 'admin', 'prefix'=> 'admin', 'before' => array('auth|admin')), function() {

	Route::resource('user', 'UsersController'); 

	Route::resource('product', 'ProductsController'); 

	Route::resource('section', 'SectionsController');

	Route::resource('subsection', 'SubsectionsController');

	Route::resource('category', 'CategoriesController');

	Route::resource('subcategory', 'SubcategoriesController');

	Route::get('/', 'AdminController@dashboard');


	Route::get('utilizadores', 'UsersController@users');

	Route::post('utilizadores', 'UsersController@users');

	Route::get('utilizadores/{id}', 'UsersController@userEdit');


	Route::get('produtos', 'ProductsController@products');


	Route::get('produtos/seccoes', 'SectionsController@sections');

	Route::get('produtos/seccoes/criar', 'SectionsController@sectionCreate');

	Route::get('produtos/seccoes/{id}', 'SectionsController@sectionEdit');

	Route::get('produtos/seccoes/publish/{id}', 'SectionsController@publish');

	Route::get('produtos/seccoes/unpublish/{id}', 'SectionsController@unpublish');


	Route::get('produtos/subseccoes', 'SubsectionsController@subsections');

	Route::post('produtos/subseccoes', 'SubsectionsController@subsections');

	Route::get('produtos/subseccoes/criar', 'SubsectionsController@subsectionCreate');

	Route::get('produtos/subseccoes/{id}', 'SubsectionsController@subsectionEdit');

	Route::get('produtos/subseccoes/{id}', 'SubsectionsController@subsectionEdit');

	Route::get('produtos/subseccoes/publish/{id}', 'SubsectionsController@publish');

	Route::get('produtos/subseccoes/unpublish/{id}', 'SubsectionsController@unpublish');


	Route::get('produtos/categorias', 'CategoriesController@categories');

	Route::post('produtos/categorias', 'CategoriesController@categories');

	Route::get('produtos/categorias/criar', 'CategoriesController@categoryCreate');

	Route::get('produtos/categorias/{id}', 'CategoriesController@categoryEdit');

	Route::get('produtos/categorias/publish/{id}', 'CategoriesController@publish');

	Route::get('produtos/categorias/unpublish/{id}', 'CategoriesController@unpublish');


	Route::get('produtos/subcategorias', 'SubcategoriesController@subCategories');

	Route::post('produtos/subcategorias', 'SubcategoriesController@subCategories');

	Route::get('produtos/subcategorias/criar', 'SubcategoriesController@subcategoryCreate');

	Route::get('produtos/subcategorias/{id}', 'SubcategoriesController@subcategoryEdit');

	Route::get('produtos/subcategorias/publish/{id}', 'SubcategoriesController@publish');

	Route::get('produtos/subcategorias/unpublish/{id}', 'SubcategoriesController@unpublish');



	Route::get('produtos/items', 'ProductsController@items');

});