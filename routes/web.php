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


$router->get('bloggers', function(){

    $blogger_repository = new \App\Repository\BloggerRepository();

    $blogger = $blogger_repository->getAll(['id', 'first_name', 'last_name', 'description', 'total_blogs', 'rating']);

    return \App\Utilities\JsonResponse::send(200, $blogger);

});
