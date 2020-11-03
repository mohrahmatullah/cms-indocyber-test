<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get( '/', [
//     'uses' => 'AuthController@goToAdminLoginPage',
//     'as'   => 'admin.login'
//   ]);

Route::group(['prefix' => '/'], function () {
  //admin login route
  Route::get( '/', [
    'uses' => 'AuthController@goToAdminLoginPage',
    'as'   => 'admin.login'
  ]);
  Route::post( 'post-login' , [
    'uses' => 'AuthController@postAdminLogin',
    'as'   => 'admin.post_login'
  ]);  
  //admin logout route
  Route::post( 'logout', [
    'uses' => 'AuthController@logoutFromLogin',
    'as'   => 'admin.logout'
  ]);

  Route::get('register', [
    'uses' => 'AuthController@registration',
    'as'   => 'admin.register'
  ]);

  Route::post('register', [
    'uses' => 'AuthController@userRegistration',
    'as'   => 'admin.post_register'
  ]);
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
	route::get('products', 'DashboardController@index')->name('products');
	route::get('products/{id}', 'DashboardController@productsUpdate')->name('update-products');
	route::post('products/{id}', 'DashboardController@saveProducts')->name('save-products');
});

Route::post('/ajax/delete-item', 'AjaxController@selectedItemDeleteById')->name('selected-item-delete');
