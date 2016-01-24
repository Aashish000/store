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
Route::get('/', ['uses' => 'RegisterController@login', 'as' => 'userLogin']);

Route::post('/', [ 'uses' => 'RegisterController@postLogin', 'as' => 'postLogin']);

//route for register user 
Route::get('/register', ['uses' => 'RegisterController@register', 'as' => 'userRegister']);
Route::post('/register', ['uses' => 'RegisterController@postRegister', 'as' => 'userRegister']);
//for logout
Route::get('logout', function(){

	\Auth::logout();
	return Redirect::route('userLogin');
});
//route for cart
Route::get('/cart', ['uses' => 'CartController@index', 'as' =>'cartIndex']);
//route for detail
Route::get('product/{id}/detail', ['uses'=> 'ProductController@detail', 'as' =>'detail']);
//Route::get('product/{id}/review', ['uses'=> 'ReviewController@store', 'as' =>'review']);
Route::post('product/{id}/detail', ['uses'=> 'ProductController@store', 'as' =>'review']);

Route::group(['prefix' => 'product', 'middleware' =>['auth']], function(){


//route for product index
Route::get('/index', ['uses' => 'ProductController@index', 'as' => 'index']);
Route::get('/add', 'ProductController@add');
//route for product list
Route::get('/list', ['uses' => 'ProductController@lists', 'as' => 'productList']);

//route for product add
Route::post( '/add', ['uses' => 'ProductController@create', 'as' => 'postAddProduct']  );
//route for product edit save delete
Route::get('/{id}/edit', ['uses' => 'ProductController@edit', 'as' => 'editProduct'] );
Route::post('/{id}/save', ['uses'=> 'ProductController@update', 'as' => 'saveProduct']);
Route::get('/{id}/delete', ['uses' => 'ProductController@destroy', 'as' => 'productDelete'] );
});