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

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::get('authors-list', 'GuestController@getAuthors');
Route::get('books-list', 'GuestController@getBooks');
Route::get('book-author/{id}', 'GuestController@booksByAuthor');


Route::group([
    'middleware' => 'jwt',
    'prefix' => 'auth',

], function () {

    Route::post('logout', 'AuthController@logout');
    Route::post('me', 'AuthController@me');
    Route::apiResource('books', 'UserController')->only([
        'index',
        'destroy',
        'store',
        'update',
    ]);

});
