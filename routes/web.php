<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//companies
Route::get('/companies', 'CompanyController@index')->name('companies.index');
Route::get('/add-company', 'CompanyController@create')->name('companies.create');
Route::post('/store-company', 'CompanyController@store')->name('companies.store');
Route::get('/pdf-company', 'CompanyController@pdfview')->name('companies.pdf');
Route::get('/companies/{companies}/edit', 'CompanyController@edit')->name('companies.edit');
Route::post('/companies/{companies}/update-company', 'CompanyController@update')->name('companies.update');

//products
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/add-product', 'ProductController@create')->name('products.create');
Route::post('/store-product', 'ProductController@store')->name('products.store');
Route::get('/pdf-product', 'ProductController@pdfview')->name('products.pdf');
Route::get('/products/{products}/edit', 'ProductController@edit')->name('products.edit');
Route::post('/products/{products}/update-product', 'ProductController@update')->name('products.update');

//paymethods
Route::get('/paymethods', 'PaymethodController@index')->name('paymethods.index');
Route::get('/add-paymethod', 'PaymethodController@create')->name('paymethods.create');
Route::post('/store-paymethod', 'PaymethodController@store')->name('paymethods.store');
Route::get('/pdf-paymethod', 'PaymethodController@pdfview')->name('paymethods.pdf');
Route::get('/paymethods/{paymethods}/edit', 'PaymethodController@edit')->name('paymethods.edit');
Route::post('/paymethods/{paymethods}/update-paymethod', 'PaymethodController@update')->name('paymethods.update');

//invoices
Route::get('/invoices', 'InvoiceController@index')->name('invoices.index');
Route::get('/add-invoice', 'InvoiceController@create')->name('invoices.create');
Route::post('/store-invoice', 'InvoiceController@store')->name('invoices.store');
Route::get('/pdf-invoice', 'InvoiceController@pdfview')->name('invoices.pdf');
Route::get('/invoices/{invoices}', 'InvoiceController@view')->name('invoices.view');
Route::get('/invoices/{invoices}/download', 'InvoiceController@download')->name('invoices.download');
Route::get('/invoices/{invoices}/edit', 'InvoiceController@edit')->name('invoices.edit');
Route::post('/invoices/{invoices}/update-invoice', 'InvoiceController@update')->name('invoices.update');


//pdf test
Route::get('/pdf/preview', 'PdfController@index')->name('pdf.preview');
Route::get('/pdf/generate', 'PdfController@create')->name('pdf.generate');