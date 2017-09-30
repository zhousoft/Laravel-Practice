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


Route::get('/', 'HomeController@index');



Route::group(
    ['namespace'=>'Home'], function () {
        Route::get('/', 'IndexController@index');
        Route::get('/cate/{cate_id}', 'IndexController@cate');
        Route::get('/a/{art_id}', 'IndexController@article');
    }
);


Route::group(
    ['prefix'=>'admin', 'namespace'=>'Admin'], function () {
        Route::any('login', 'LoginController@login');
        Route::get('code', 'LoginController@code');
    }
);

Route::group(
    ['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['admin.login']], function () {
        Route::get('index', 'IndexController@index');
        Route::get('info', 'IndexController@info');
        Route::get('quit', 'LoginController@quit');
        Route::any('pass', 'IndexController@pass');

        Route::post('cate/changeorder', 'CategoryController@changeOrder');
        Route::resource('category', 'CategoryController');

        Route::post('links/changeorder', 'LinksController@changeOrder');
        Route::resource('links', 'LinksController');

        Route::post('navs/changeorder', 'NavsController@changeOrder');
        Route::resource('navs', 'NavsController');
        
        Route::post('config/changecontent', 'ConfigController@changeContent');
        Route::post('config/changeorder', 'ConfigController@changeOrder');
        Route::resource('config', 'ConfigController');
        
        Route::resource('article', 'ArticleController');
        Route::any('upload', 'CommonController@upload');
    }
);
