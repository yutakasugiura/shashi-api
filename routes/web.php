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
Route::put('import_json', 'ImportController@store')->name('import.store');

//特定企業を非表示に変更（削除）
Route::put('disable_company', 'ImportController@delete')->name('import.delete');

//CSVで業績データを保存
Route::put('import_csv', 'CsvController@store')->name('csv.store');
