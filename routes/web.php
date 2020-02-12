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

Route::fallback(function () {
    return view("erro404");
});

Route::get('/', 'HomeController@index')->name('home.index');

Route::get('/recipes', 'RecipesController@index')->name('recipes.index');
Route::get('/recipes/item', 'RecipesController@item')->name('recipes.show');

Route::get('/community', 'CommunityController@index')->name('community.index')->middleware('auth');


Route::prefix('register')->group(function () {

    Route::get('/', 'Auth\RegisterUserController@index')->name('register');
    Route::post('/', 'Auth\RegisterUserController@register');

    Route::get('provider', 'Auth\RegisterProviderController@index')->name('register.provider');
    Route::post('provider','Auth\RegisterProviderController@register');
});

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@authenticade');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::resource('/address','AddressController')->middleware('auth');


Route::prefix('provider')->group(function (){

    Route::get('/','ProfileController@index')->name('profile');
    Route::put('/','ProfileController@uploadUser');
    Route::delete('/delImage/{id}','ProfileController@deleteImage')->name('del.image');
});
