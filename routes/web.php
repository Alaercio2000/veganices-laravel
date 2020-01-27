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

Route::get('/', 'HomeController@index')->name('home.index');

Route::get('/recipes', 'RecipesController@index')->name('recipes.index');
Route::get('/recipes/item', 'RecipesController@item')->name('recipes.show');

Route::get('/register', 'RegisterController@index')->name('register.index');

Route::get('/community','CommunityController@index')->name('community.index');

