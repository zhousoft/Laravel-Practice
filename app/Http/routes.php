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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['web','admin.login']], function(){
    Route::get('/', ['uses' => 'IndexController@index']);
   // Route::get('login/profile','IndexController@login')->name('profile');
});

Route::group(['middleware'=>['web']], function(){
    Route::get('admin/login','Admin\IndexController@login');
});