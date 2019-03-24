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


use Illuminate\Http\Request;

$router->get('bloggers', 'BloggerController@list');

$router->post('bloggers', 'BloggerController@create');

$router->put('bloggers/{id}', 'BloggerController@update');

$router->delete('bloggers/{id}', 'BloggerController@delete');

/*$router->post('bloggers', function(Request $request){

    $this->validate($request, [
        'first_name' => 'required | string | max:50',
        'last_name' => 'string | max:50',
        'description' => 'required | string',
        'total_blogs' => 'integer'
    ]);

    $blogger_repository = new \App\Repository\BloggerRepository();

    $blogger_repository->create($request->all());

    return \App\Utilities\JsonResponse::send(201);

});

$router->put('bloggers/{id}', function(Request $request, $id){

    $this->validate($request, [
        'first_name' => 'required | string | max:50',
        'last_name' => 'string | max:50',
        'description' => 'required | string',
        'total_blogs' => 'integer'
    ]);

    $blogger_repository = new \App\Repository\BloggerRepository();

    $blogger_repository->update($request->all(), $id);

    return \App\Utilities\JsonResponse::send(200);

});

$router->delete('bloggers/{id}', function(Request $request, $id){


    $blogger_repository = new \App\Repository\BloggerRepository();

    $blogger_repository->delete($id);

    return \App\Utilities\JsonResponse::send(200);

});

$router->put('bloggers/{id}/rating', function(Request $request, $id){


    $this->validate($request, [
        'rating' => 'numeric | min:1 | max:5'
    ]);
    $blogger_repository = new \App\Repository\BloggerRatingRepository();

    $blogger_repository->rate($id, $request->rating);

    return \App\Utilities\JsonResponse::send(200);

});*/
