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

Route::get('/', 'IndexController@index')->name('company.index');

Route::post('create', 'CreateController@store')->name('company.store');

Route::put('create', 'CreateController@update')->name('company.update');

Route::get('company/{stock_code}', 'ContentController@index')->name('content.index');

//TODO: API.phpで管理する（なぜか変数を認識しない...）
Route::get('api/company/{company}', 'API\CompanyController@show')->name('api.company.show');
