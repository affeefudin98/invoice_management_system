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

Route::get('/companies', 'CompanyController@index')->name('companies.index');
Route::get('/add-company', 'CompanyController@create')->name('companies.create');
Route::post('/store-company', 'CompanyController@store')->name('companies.store');

Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/add-product', 'ProductController@create')->name('products.create');
Route::post('/store-product', 'ProductController@store')->name('products.store');

Route::get('/paymethods', 'PaymethodController@index')->name('paymethods.index');
Route::get('/add-paymethod', 'PaymethodController@create')->name('paymethods.create');
Route::post('/store-paymethod', 'PaymethodController@store')->name('paymethods.store');

Route::get('/invoices', 'InvoiceController@index')->name('invoices.index');
Route::get('/add-invoice', 'InvoiceController@create')->name('invoices.create');
Route::post('/store-invoice', 'InvoiceController@store')->name('invoices.store');