<?php

use Illuminate\Http\Request;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/register', 'RegisterController@register');

Route::group(['prefix' => 'recipes'], function () {

	Route::get('/', 'RecipeController@index');

	Route::get('/{slug}', 'RecipeController@show', function($slug = 'chinese') {
		return $slug;
	});

	Route::post('/', 'RecipeController@store')->middleware('auth:api');

	Route::patch('/{recipe}', 'RecipeController@update')->middleware('auth:api');

	Route::delete('/{recipe}', 'RecipeController@destroy')->middleware('auth:api');

	Route::group(['prefix' => '/ratings/{recipe}'], function () {
		Route::post('/', 'RecipeRatingController@store')->middleware('auth:api');
	});

});


