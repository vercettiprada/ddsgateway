<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    echo "<center> Welcome </center>";
});

$router->get('/version', function () use ($router) {
    return $router->app->version();
});

// AUTHENTICATION ROUTES
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');
    $router->post('user-profile', 'AuthController@me');
});

// 🔒 PROTECT `/users1` ROUTES (ONLY AUTHENTICATED USERS CAN ACCESS)
$router->group(['middleware' => 'auth:api'], function () use ($router) {
    // API GATEWAY ROUTES FOR SITE1 users
    $router->get('/users1', 'User1Controller@index');
    $router->post('/users1', 'User1Controller@add');           
    $router->get('/users1/{id}', 'User1Controller@show');       
    $router->put('/users1/{id}', 'User1Controller@update');    
    $router->patch('/users1/{id}', 'User1Controller@update');   
    $router->delete('/users1/{id}', 'User1Controller@delete');  
});

// 🔒 PROTECT `/users2` ROUTES (ONLY AUTHENTICATED USERS CAN ACCESS)
$router->group(['middleware' => 'auth:api'], function () use ($router) {
    $router->get('/users2', 'User2Controller@index');
    $router->post('/users2', 'User2Controller@add');            
    $router->get('/users2/{id}', 'User2Controller@show');       
    $router->put('/users2/{id}', 'User2Controller@update');    
    $router->patch('/users2/{id}', 'User2Controller@update');   
    $router->delete('/users2/{id}', 'User2Controller@delete');  
});
