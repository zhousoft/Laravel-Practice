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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'IndexController@index');
// Route::get('/', function(){
//     echo phpinfo();
// });
// Route::get('/view', function () {
//     return view('my_laravel');
// });
Route::get('view','ViewController@index');

Route::get('view','ViewController@view');

Route::get('article', 'ViewController@article');

Route::get('layouts', 'ViewController@layouts');

// Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['web','admin.login']], function(){
//  Route::get('login','IndexController@login');
//     Route::get('/', ['uses' => 'IndexController@index']);
//    // Route::get('login/profile','IndexController@login')->name('profile');
// });



Route::group(['prefix'=>'admin', 'namespace'=>'Admin'],function(){
    Route::any('login','LoginController@login');
    Route::get('code','LoginController@code');
});

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['admin.login']],function(){
    Route::get('index','IndexController@index');
    Route::get('info','IndexController@info');
    Route::get('quit','LoginController@quit');
    Route::any('pass','IndexController@pass');

    Route::post('cate/changeorder','CategoryController@changeOrder');

    Route::resource('category', 'CategoryController');

    Route::resource('article', 'ArticleController');
    Route::any('upload','CommonController@upload');
});