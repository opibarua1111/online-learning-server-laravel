<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [ 'as' => 'register', 'uses' => 'API\AuthController@register']);
Route::post('login', [ 'as' => 'login', 'uses' => 'API\AuthController@login']);

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('details', [ 'as' => 'details', 'uses' => 'API\AuthController@details']);
});

Route::post('books', [ 'as' => 'books', 'uses' => 'API\BookController@index']);
Route::post('store-book', [ 'as' => 'store-book', 'uses' => 'API\BookController@store']);
Route::post('single-book/{id}', [ 'as' => 'single-book', 'uses' => 'API\BookController@singleBook']);
Route::post('delete-book/{id}', [ 'as' => 'delete-book', 'uses' => 'API\BookController@delete']);
Route::post('update-book/{id}', [ 'as' => 'update-book', 'uses' => 'API\BookController@update']);