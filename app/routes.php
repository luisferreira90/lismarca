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

	Route::get('/', 'AdminController@dashboard');


	Route::get('utilizadores', 'UsersController@users');

	Route::post('utilizadores', 'UsersController@users');

	Route::get('utilizadores/{id}', 'UsersController@userEdit');


	Route::get('produtos', 'ProductsController@products');


	Route::get('produtos/seccoes', 'SectionsController@sections');

	Route::get('produtos/seccoes/criar', 'SectionsController@sectionCreate');

	Route::get('produtos/seccoes/{id}', 'SectionsController@sectionEdit');


	Route::get('produtos/subseccoes', 'ProductsController@subSections');

	Route::get('produtos/categorias', 'ProductsController@categories');

	Route::get('produtos/subcategorias', 'ProductsController@subCategories');

	Route::get('produtos/items', 'ProductsController@items');

});