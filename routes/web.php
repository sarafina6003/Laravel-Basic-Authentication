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

Route::get('/', 'PagesController@index');
Route::get('/403', 'PagesController@unavailable');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('companies', 'CompanyController', [
    'names' => [
        'index' => 'companies',
        'create' => 'companies.create',
        'edit' => 'companies.edit',
        'show' => 'companies.show',
    ]]);
Route::resource('employees', 'EmployeeController', [
    'names' => [
        'index' => 'employees',
        'create' => 'employees.create',
        'edit' => 'employees.edit',
        'show' => 'employees.show',
    ]]);
Auth::routes();
