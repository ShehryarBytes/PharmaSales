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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::resource('employees', 'EmployeesController', [
    'names' => [
        'employees/index' => 'EmployeesController@index',
        'employees/create' => 'EmployeesController@create',
        'employees/show' => 'EmployeesController@show',
    ]
])->middleware('verified');

Route::resource('products', 'ProductsController', [
    'names' => [
        'products/index' => 'ProductsController@index',
        'products/create' => 'ProductsController@create',
        'products/show' => 'ProductsController@show',
    ]
])->middleware('verified');

Route::resource('customers', 'CustomersController', [
    'names' => [
        'customers/index' => 'CustomersController@index',
        'customers/create' => 'CustomersController@create',
        'customers/show' => 'CustomersController@show',
    ]
])->middleware('verified');

Route::resource('companies', 'CompaniesController', [
    'names' => [
        'companies/index' => 'CompaniesController@index',
        'companies/create' => 'CompaniesController@create',
        'companies/show' => 'CompaniesController@show',
    ]
])->middleware('verified');

Route::resource('orders', 'OrdersController', [
    'names' => [
        'orders/index' => 'OrdersController@index',
        'orders/update' => 'OrdersController@update',
        'orders/show' => 'OrdersController@show',
    ]
])->middleware('verified');

//Route::get('/getarea',function (){
//
//    $user = User::find(1);
//
//        foreach ($user->areas as $area )
//        {
//            echo $area->name;
//        }
//
//});

