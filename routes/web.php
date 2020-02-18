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


Route::resource('/recipes', 'RecipesController')->middleware('auth')->middleware('can:is-provider');

Route::get('user/recipes' , 'RecipesUsersController@index')->name('user.recipes');
Route::get('user/recipes/show/{id}' , 'RecipesUsersController@show')->name('user.recipe.show');

Route::get('/community', 'CommunityController@index')->name('community.index');

Route::prefix('register')->group(function () {

    Route::get('/', 'Auth\RegisterUserController@index')->name('register');
    Route::post('/', 'Auth\RegisterUserController@register');

    Route::get('provider', 'Auth\RegisterProviderController@index')->name('register.provider');
    Route::post('provider','Auth\RegisterProviderController@register');
});

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@authenticade');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::resource('/address','AddressController')->middleware('auth')->middleware('can:is-user');


Route::prefix('profile')->group(function (){

    Route::get('/','ProfileController@index')->name('profile')->middleware('auth')->middleware('can:is-user');

    Route::prefix('provider')->group(function(){

        Route::get('/','ProfileProviderController@index')->name('profile.provider')->middleware('auth')->middleware('can:is-provider');

    });

    Route::put('/upload/{route}', 'UploadController@uploadImageProfile')->name('upload')->middleware('auth');
    Route::delete('/delImage/{id}/{route}','UploadController@deleteImage')->name('del.image')->middleware('auth');
});
