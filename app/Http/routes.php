<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::auth();

Route::group(['middleware' => ['web']], function () {


    Route::group(['middleware' => ['auth']], function () {

        Route::get('/home', 'SportController@index');
        Route::get('sport/{id}', 'SportController@getCompetitions');
        Route::get('competition/{id}', 'SportController@getGames');
        Route::get('parse-data', 'ParserController@parseData');
    });
});