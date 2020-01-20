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

<<<<<<< HEAD
Route::get('/', 'HomeController@index')->name('homeUrl');

Route::get('/recipes', 'RecipesController@recipes')->name('recipesUrl');;
Route::get('/recipes/item', 'RecipesController@item')->name('itemUrl');
Route::get('/cadastro', 'CadastroController@index');


=======
Route::get('/', 'HomeController@index');

Route::get('/recipes', 'RecipesController@index');

Route::get('/cadastro', 'CadastroController@index');
>>>>>>> cce72095586c192eb833608e5be4bc80a83f1a59

