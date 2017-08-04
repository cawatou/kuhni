<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/', 'Front\IndexController@index');
Route::get('/designer', 'Front\IndexController@designer');
Route::get('/projects', 'Front\IndexController@projects');

Route::post('/add_callback', 'Front\IndexController@add_callback');


$router->group(['middleware' => 'auth', 'prefix'=>"administrator"], function()
{
	Route::get('/', 'Admin\IndexController@index');
	Route::get('/items/{type}', 'Admin\ItemsController@index');
    Route::match(['get', 'post'], '/items/{type}/add', 'Admin\ItemsController@add');
    Route::match(['get', 'post'], '/items/{type}/edit/{id}', 'Admin\ItemsController@edit');
	Route::get('/items/{type}/delete/{id}', 'Admin\ItemsController@delete');
	Route::match(['get', 'post'],'/items/{item_type}/designers/{designer_type}/{id}', 'Admin\ItemsController@designers');
	Route::get('/items/{type}/callbacks/{id}', 'Admin\ItemsController@callbacks');
	Route::get('/items/{type}/callbacks/delete/{id}', 'Admin\ItemsController@delete_callbacks');
    
    Route::match(['get', 'post'], '/items/recipients/{itemid}', 'Admin\ItemsController@recipients');
    
	Route::get('/users', 'Admin\UsersController@index');
    Route::match(['get', 'post'], '/users/add', 'Admin\UsersController@add');
    Route::match(['get', 'post'], '/users/edit/{id}', 'Admin\UsersController@edit');
	Route::get('/users/delete/{id}', 'Admin\UsersController@delete');
    
	Route::get('/collections/{type}/{itemid}', 'Admin\CollectionsController@index');
    Route::match(['get', 'post'], '/collections/{type}/{itemid}/add', 'Admin\CollectionsController@add');
    Route::match(['get', 'post'], '/collections/{type}/{itemid}/edit/{id}', 'Admin\CollectionsController@edit');
    Route::match(['get', 'post'], '/collections/{type}/{itemid}/publish/{id}', 'Admin\CollectionsController@publish');
	Route::get('/collections/{itemid}/delete/{id}', 'Admin\CollectionsController@delete');
    
	Route::match(['get', 'post'], '/menu/{itemid}', 'Admin\MenusController@index');
	Route::match(['get', 'post'], '/settings', 'Admin\SettingsController@index');
	Route::match(['get', 'post'], '/items/settings/{id}', 'Admin\SettingsController@itemset');
	Route::match(['get', 'post'], '/items/statistic/{id}', 'Admin\ItemsController@statistic');
    
	Route::get('/slider/{itemid}', 'Admin\SliderController@index');
    Route::match(['get', 'post'], '/slider/{itemid}/add', 'Admin\SliderController@add');
    Route::match(['get', 'post'], '/slider/{itemid}/edit/{id}', 'Admin\SliderController@edit');
	Route::get('/slider/{itemid}/delete/{id}', 'Admin\SliderController@delete');
    
	Route::get('/reviews/{itemid}', 'Admin\ReviewsController@index');
    Route::match(['get', 'post'], '/reviews/{itemid}/add', 'Admin\ReviewsController@add');
    Route::match(['get', 'post'], '/reviews/{itemid}/edit/{id}', 'Admin\ReviewsController@edit');
	Route::get('/reviews/{itemid}/delete/{id}', 'Admin\ReviewsController@delete');
});