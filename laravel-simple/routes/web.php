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

Route::get('/', function () {
    return view('welcome');
});

Route::get('qho_login',['as' => 'getLogin', 'uses' => 'LoginController@getLogin']);

Route::post('qho_login',['as' => 'postLogin', 'uses' => 'LoginController@postLogin']);

Route::get('logout',['as' => 'getLogout', 'uses' => 'LoginController@getLogout']);

// dịnh danh
// Route::get('admin', ['as' => 'admin', 'middleware' => 'auth', function(){
//   return view('admin.dashboard.main');
// }]);

Route::group(['middleware' => 'verify'], function () {
  Route::group(['prefix' => 'qho_admin', 'namespace' => 'Admin'], function() {
    Route::get('/', function(){
      return view('admin.module.dashboard.main');
    });

    Route::group(['prefix' => 'category'], function(){
      Route::get('add', ['as' => 'getCateAdd', 'uses' => 'CateController@getCateAdd']);
      Route::post('add', ['as' => 'postCateAdd', 'uses' => 'CateController@postCateAdd']);
      Route::get('edit/{id}', ['as' => 'getCateEdit', 'uses' => 'CateController@getCateEdit'])->where('id', '[0-9]+');
      Route::post('edit{id}', ['as' => 'postCateEdit', 'uses' => 'CateController@postCateEdit'])->where('id', '[0-9]+');
      Route::get('list', ['as' => 'getCateList', 'uses' => 'CateController@getCateList']);
      Route::get('delete/{id}', ['as' => 'getCateDel', 'uses' => 'CateController@getCateDel'])->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'user'], function(){
      Route::get('add', ['as' => 'getUserAdd', 'uses' => 'UserController@getUserAdd']);
      Route::post('add', ['as' => 'postUserAdd', 'uses' => 'UserController@postUserAdd']);
      Route::get('list', ['as' => 'getUserList', 'uses' => 'UserController@getUserList']);
    });

    Route::group(['prefix' => 'news'], function(){

    });
  });
});

// Route::get('admin', function(){
//   echo "Hello";
// });

// //Route::get('san-pham',['as' => 'getProduct', 'uses' => 'ProductController@getProduct']);

// Route::get('test', function(){
//   return view('admin.category.cate_add');
// });

