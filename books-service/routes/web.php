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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('book', 'BookController@index');
$router->get('book/{book}', 'BookController@show');
$router->post('book', 'BookController@store');
$router->put('book/{book}', 'BookController@update');
$router->patch('book/{book}', 'BookController@update');
$router->delete('book/{book}', 'BookController@destroy');
