<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('company', 'API\CompanyController', ['only' => ['index']]);
//TODO: 修正（なぜか変数を認識しない...）
Route::apiResource('company/', 'API\CompanyController', ['only' => ['show']]);
Route::apiResource('history/{stock_code}', 'API\HistoryController', ['only' => ['index']]);
