<?php
use App\Http\Controllers\OperatorsAuthController;
use App\Http\Controllers\CustomersAuthController;
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


Route::get('/', 'OperatorsAuthController@index')->name('operators.home')->middleware("auth:weboperators");
Route::get('/login', 'OperatorsAuthController@login')->name('operators.login');
Route::get('/logout', 'OperatorsAuthController@logout')->name('operators.logout');
Route::post('/login', 'OperatorsAuthController@handLogin')->name('operators.handLogin');
Route::get('/create', 'OperatorsAuthController@create')->name('operators.create')->middleware("auth:weboperators");
Route::get('/viewCustomers', 'OperatorsAuthController@view')->middleware("auth:weboperators");
Route::get('/AddCustomers', 'OperatorsAuthController@AddCustomers')->middleware("auth:weboperators");
Route::post('/AddCustomers', 'OperatorsAuthController@AddCustomer');
Route::post('/updateUser/{id}', 'OperatorsAuthController@update');
Route::post('/delete_user/{id}', 'OperatorsAuthController@destroy');

Route::get('/customers', 'CustomersAuthController@index')->name('customers.home')->middleware("auth:webcustomers");
Route::get('/customers/login', 'CustomersAuthController@login')->name('customers.login');
Route::get('/customers/logout', 'CustomersAuthController@logout')->name('customers.logout');
Route::post('/customers/login', 'CustomersAuthController@handLogin')->name('customers.handLogin');
Route::get('/salesOrder', 'CustomersAuthController@viewInvoice')->middleware("auth:webcustomers")->middleware("auth:webcustomers");
Route::get('/ViewInvoices', 'CustomersAuthController@Invoices')->middleware("auth:webcustomers")->middleware("auth:webcustomers");

Route::post('/get_drop_id', 'OperatorsAuthController@get_drop_id');
Route::resource('/sale_order', 'SalesOrderAuthController');
Route::resource('/invoices', 'InvoiceController')->middleware("auth:webcustomers");
Route::get('/invoiceView/{id}', 'InvoiceController@view')->middleware("auth:webcustomers");
Route::post('/invoiceItem', 'InvoiceController@invoice_items');
Route::resource('/payment', 'PaymentController')->middleware("auth:webcustomers");


// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
