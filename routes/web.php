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

//管理画面トップページの表示
//TODO: 認証画面としてのトップページは後日実装
Route::get('/', 'ImportController@index')->name('import.index');

//Json経由で企業情報を一括で永続化
Route::put('store', 'ImportController@store')->name('import.store');
