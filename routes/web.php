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

use App\User;
use App\Products;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::resource('employees', 'EmployeesController')->middleware('verified');

Route::resource('products', 'ProductsController')->middleware('verified');

Route::resource('customers', 'CustomersController')->middleware('verified');

Route::resource('companies', 'CompaniesController')->middleware('verified');

Route::resource('orders', 'OrdersController')->middleware('verified');
Route::resource('enterprise', 'EnterprisesController')->middleware('verified');

Route::get('/getarea',function (){

    $pro = \App\User::find(1);

        echo $pro->enterprise;

});

