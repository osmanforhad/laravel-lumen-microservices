<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\ExampleController;
use App\Http\Controllers\PostsController;

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

//Setup Routes inside Groups
$router->group(['prefix' => 'api/v1'], function ($router) {

    //__Posts API Route__//
    $router->group(['prefix' => 'posts'], function ($router) {
        $router->post('add', 'PostsController@createPost');
        $router->put('update/{id}', 'PostsController@updatePost');
        $router->get('view/{id}', 'PostsController@viewPost');
        $router->delete('delete/{id}', 'PostsController@deletePost');
        $router->get('show', 'PostsController@index');
    });

    //__Users API Route__//
    $router->group(['prefix' => 'users'], function ($router) {
        $router->post('add', 'UsersController@add');
        $router->put('update/{id}', 'UsersController@update');
        $router->get('view/{id}', 'UsersController@view');
        $router->delete('delete/{id}', 'UsersController@delete');
        $router->get('show', 'UsersController@index');
    });
});
