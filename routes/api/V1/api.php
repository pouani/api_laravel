<?php

use Illuminate\Http\Request;
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

Route::post('/login','App\Http\Controllers\Api\V1\LoginController@login');

Route::middleware('auth:api')->post('/product', 
'App\Http\Controllers\Api\V1\ProductController@createAction');

Route::middleware('auth:api')->put('/product', 
'App\Http\Controllers\Api\V1\ProductController@updateAction');

Route::middleware('auth:api')->delete('/product/{id}', 
'App\Http\Controllers\Api\V1\ProductController@deleteAction');

Route::middleware('auth:api')->get('/product/{id}', 
'App\Http\Controllers\Api\V1\ProductController@viewAction');

Route::middleware('auth:api')->get('/product', 
'App\Http\Controllers\Api\V1\ProductController@listAction');