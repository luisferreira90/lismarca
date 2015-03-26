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

	Route::resource('section', 'SectionsController');

	Route::resource('subsection', 'SubsectionsController');

	Route::resource('category', 'CategoriesController');

	Route::resource('subcategory', 'SubcategoriesController');

	Route::resource('item', 'ItemsController');

	Route::resource('entity', 'EntitiesController');

	Route::resource('location', 'LocationsController');

	Route::get('/', 'UsersController@users');


	Route::get('utilizadores', 'UsersController@users');

	Route::post('utilizadores', 'UsersController@users');

	Route::get('utilizadores/{id}', 'UsersController@userEdit');


	Route::get('seccoes', 'SectionsController@sections');

	Route::get('seccoes/criar', 'SectionsController@create');

	Route::get('seccoes/{id}', 'SectionsController@edit');

	Route::get('seccoes/publish/{id}', 'SectionsController@publish');

	Route::get('seccoes/unpublish/{id}', 'SectionsController@unpublish');


	Route::get('subseccoes', 'SubsectionsController@subsections');

	Route::post('subseccoes', 'SubsectionsController@subsections');

	Route::get('subseccoes/criar', 'SubsectionsController@create');

	Route::get('subseccoes/{id}', 'SubsectionsController@edit');

	Route::get('subseccoes/publish/{id}', 'SubsectionsController@publish');

	Route::get('subseccoes/unpublish/{id}', 'SubsectionsController@unpublish');


	Route::get('categorias', 'CategoriesController@categories');

	Route::post('categorias', 'CategoriesController@categories');

	Route::get('categorias/criar', 'CategoriesController@create');

	Route::get('categorias/{id}', 'CategoriesController@edit');

	Route::get('categorias/publish/{id}', 'CategoriesController@publish');

	Route::get('categorias/unpublish/{id}', 'CategoriesController@unpublish');


	Route::get('subcategorias', 'SubcategoriesController@subCategories');

	Route::post('subcategorias', 'SubcategoriesController@subCategories');

	Route::get('subcategorias/criar', 'SubcategoriesController@create');

	Route::get('subcategorias/{id}', 'SubcategoriesController@edit');

	Route::get('subcategorias/publish/{id}', 'SubcategoriesController@publish');

	Route::get('subcategorias/unpublish/{id}', 'SubcategoriesController@unpublish');



	Route::get('entidades', 'EntitiesController@entities');

	Route::post('entidades', 'EntitiesController@entities');

	Route::get('entidades/criar', 'EntitiesController@create');

	Route::get('entidades/{id}', 'EntitiesController@edit');


	Route::get('localizacoes', 'LocationsController@locations');

	Route::post('localizacoes', 'LocationsController@locations');

	Route::get('localizacoes/criar', 'LocationsController@create');

	Route::get('localizacoes/{id}', 'LocationsController@edit');



	Route::get('items', 'ItemsController@items');

	Route::post('items', 'ItemsController@items');

	Route::get('items/criar', 'ItemsController@create');

	Route::get('items/{id}', 'ItemsController@edit');

	Route::get('items/publish/{id}', 'ItemsController@publish');

	Route::get('items/unpublish/{id}', 'ItemsController@unpublish');

});