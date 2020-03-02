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

//Erro de página não encontrada
Route::fallback(function () {
    return view("erro404");
});


// Registro de usuário e fornecedores
Route::prefix('register')->group(function () {

    Route::get('/', 'Auth\RegisterUserController@index')->name('register');
    Route::post('/', 'Auth\RegisterUserController@register');

    Route::get('provider', 'Auth\RegisterProviderController@index')->name('register.provider');
    Route::post('provider', 'Auth\RegisterProviderController@register');
});
//


// Rotas permitidas para usuários não logados
Route::get('/', 'HomeController@index')->name('home.index');

Route::get('user/recipes', 'RecipesUsersController@index')->name('user.recipes');
Route::get('user/recipes/show/{id}', 'RecipesUsersController@show')->name('user.recipe.show');

Route::get('/community', 'CommunityController@index')->name('community.index');

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@authenticade');
//


// Apenas usuários logados
Route::middleware('auth')->group(function () {

    // Apenas usuários normais
    Route::middleware('can:is-user')->group(function () {

        Route::prefix('cart')->group(function () {

            Route::get('/', 'CartsController@index')->name('cart.index');
            Route::get('confirmation', 'CartsController@confirmation')->name('cart.confirmation');
            Route::put('confirmation/alter-address', 'CartsController@alterAddress')->name('cart.alter.address');
            Route::post('create/{recipe}', 'CartsController@store')->name('cart.store');
            Route::put('update/quantity/{id}', 'CartsController@updateQuantity')->name('cart.update.quantity');
            Route::delete('destroy/{recipe}', 'CartsController@destroyRecipe')->name('cart.destroy.recipe');
            Route::delete('destroy/cart/{id}', 'CartsController@destroy')->name('cart.destroy');

        });

        Route::prefix('profile')->group(function () {

            Route::get('/', 'ProfileController@index')->name('profile');
            Route::get('/edit', 'ProfileController@edit')->name('profile.edit');
            Route::put('/edit', 'ProfileController@update')->name('profile.update');

        });

        Route::resource('/address', 'AddressController');

        Route::resource('/community', 'CommunityController');

    });
    //

    // Ações para ambos usuários
    Route::put('profile/upload/{route}', 'UploadController@uploadImageProfile')->name('upload');
    Route::delete('profile/delImage/{id}/{route}', 'UploadController@deleteImage')->name('del.image');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    //



    //Apenas fornecedores
    Route::middleware('can:is-provider')->group(function () {

        Route::resource('/recipes', 'RecipesController')->middleware('can:is-provider');


        Route::prefix('profile/provider')->group(function () {

            Route::get('/', 'ProfileProviderController@index')->name('profile.provider')->middleware('can:is-provider');
            Route::get('/edit', 'ProfileProviderController@edit')->name('profile.provider.edit')->middleware('can:is-provider');
            Route::put('/edit', 'ProfileProviderController@update')->name('profile.provider.update')->middleware('can:is-provider');

        });
    });
    //
});
//
