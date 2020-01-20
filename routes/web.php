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

Route::get('/', 'HomeController@index')->name('homeUrl');

Route::get('/recipes', 'RecipesController@recipes')->name('recipesUrl');;
Route::get('/recipes/item', 'RecipesController@item')->name('itemUrl');
Route::get('/cadastro', 'CadastroController@index');



