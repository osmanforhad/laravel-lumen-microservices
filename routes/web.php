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

$router->group(['prefix' => 'api/v1'], function ($router) {
    $router->post('posts/add', 'PostsController@createPost');
    $router->put('posts/update/{id}', 'PostsController@updatePost');
    $router->get('posts/view/{id}', 'PostsController@viewPost');
    $router->delete('posts/delete/{id}', 'PostsController@deletePost');
    $router->get('posts/show', 'PostsController@index');
});
