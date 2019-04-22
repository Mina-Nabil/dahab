<?php
use Illuminate\Notifications\RoutesNotifications;

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

Route::get('/', 'OrdersController@home');

//Orders Routes
Route::get('orders/profile/{id}', 'OrdersController@profile');

Route::get('orders/add', 'OrdersController@startNewOrder');
Route::get('orders/modify/{id}', 'OrdersController@startNewOrder');

Route::post('orders/insert', 'OrdersController@insertOrder');
Route::post('orders/edit/{id}', 'OrdersController@editOrder');

Route::get('orders/cancel/{id}', 'OrdersController@cancelOrder');
Route::get('orders/confirm/{id}', 'OrdersController@confirmOrder');


//Model routes
Route::get('models/types', 'ModelsController@typesPage');
Route::get('models/types/{id}', 'ModelsController@typesPage');

Route::post('models/types', 'ModelsController@typesPage');
Route::post('models/types/{id}', 'ModelsController@typesPage');

Route::get('models/show', 'ModelsController@show');
Route::get('models/add', 'ModelsController@addPage');
Route::get('models/edit/{id}', 'ModelsController@addPage');


Route::post('models/modify/{id}', 'ModelsController@modify');
Route::post('models/insert', 'ModelsController@insert');

//Stamps Routes
Route::get('stamps/show', 'StampsController@show');
Route::get('stamps/edit/{id}', 'StampsController@addPage');
Route::get('stamps/add', 'StampsController@addPage');

Route::post('stamps/modify/{id}', 'StampsController@modify');
Route::post('stamps/insert', 'StampsController@insert');

//User routes
Route::get('users/show', 'UserController@show')->name('users/show');
Route::get('users/add', 'UserController@add')->name('users/add');
Route::post('users/insert', 'UserController@insert')->name('users/insert');
Route::get('users/edit/{id}', 'UserController@profile');
Route::post('users/update/{id}', 'UserController@update');


//Auth::routes(['register' => false]);
Route::post('logout', 'HomeController@logout')->name('logout');
Route::get('logout', 'HomeController@logout')->name('logout');


Route::post('login', 'HomeController@login')->name('login');
Route::get('login', 'HomeController@login')->name('loginHome');


Route::get('/home', 'OrdersController@home')->name('home');
