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

//企業一覧
Route::apiResource('company', 'API\CompanyController', ['only' => ['index']]);

//企業詳細
Route::apiResource('company', 'API\CompanyController', ['only' => ['show']]);
