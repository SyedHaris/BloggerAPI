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


$router->get('bloggers', 'BloggerController@list');

$router->post('bloggers', 'BloggerController@create');

$router->put('bloggers/{id}', 'BloggerController@update');

$router->delete('bloggers/{id}', 'BloggerController@delete');

$router->put('bloggers/{id}/rating', 'BloggerRatingController@rate');

$router->get('bloggers/{id}', 'BloggerController@read');

