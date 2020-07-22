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

// Auth::routes();

//Remove registration facility for everyone
Auth::routes([
    'register' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

//Company Routes

Route::get('/createcompany', 'CompanyController@index')->name('createcompany');

Route::post('/save_company','CompanyController@store');

Route::get('delete_company/{id}','CompanyController@destroy');

Route::get('createcompany/edit', 'CompanyController@edit'); 

Route::post('/update_company','CompanyController@update');

//Employee Routes

Route::get('/createemployee', 'EmployeeController@index')->name('createemployee');

Route::post('/save_employee','EmployeeController@store');

Route::get('delete_employee/{id}','EmployeeController@destroy');

Route::get('createemployee/edit', 'EmployeeController@edit');

Route::post('/update_employee','EmployeeController@update');

//Datatable Routes

Route::get('/createdatatable', 'SampleDatatable@index')->name('createdatatable');
