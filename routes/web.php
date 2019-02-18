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

Route::get('/', 'PageController@index');
Route::post('/add_data', 'PageController@add_data');
// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::get('/home', 'HomeController@index');

Route::get('admin/home', 'AdminController@index');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('admin/dashboard', 'AdminController@dashboard');
Route::get('admin/manage', 'AdminController@manage');
Route::get('admin/delete', 'AdminController@delete')->name('admin.delete');
Route::get('admin/fetchdata', 'AdminController@fetchdata')->name('admin.fetchdata');
Route::post('admin/add', 'AdminController@add')->name('admin.add');
Route::post('admin/update', 'AdminController@update')->name('admin.update');


