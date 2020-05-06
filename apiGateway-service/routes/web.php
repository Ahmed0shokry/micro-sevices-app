<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['middleware' => 'client.credentials'], function () use($router){

    /*
     * author service routes
     */
    $router->get('author', 'AuthorController@index');
    $router->get('author/{author}', 'AuthorController@show');
    $router->post('author', 'AuthorController@store');
    $router->put('author/{author}', 'AuthorController@update');
    $router->patch('author/{author}', 'AuthorController@update');
    $router->delete('author/{author}', 'AuthorController@destroy');

    /*
     * book service routes
     */
    $router->get('book', 'BookController@index');
    $router->get('book/{book}', 'BookController@show');
    $router->post('book', 'BookController@store');
    $router->put('book/{book}', 'BookController@update');
    $router->patch('book/{book}', 'BookController@update');
    $router->delete('book/{book}', 'BookController@destroy');

});
