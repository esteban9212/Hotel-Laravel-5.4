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
  return redirect('login');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/main', 'MainController@index');

Route::get('/createHotel', 'CreateHotelController@index');

Route::resource('cities', 'CityController');

Route::resource('hotels', 'HotelController');

Route::resource('comments', 'CommentController');

Route::get('/searchHotel', 'SearcHotelController@index');
