<?php

/**
 * all the application routes go here
 */

$router->get('/', 'HomeController@index');

// all routes related to user
$router->get('/user/login', 'UserController@getLogin');
$router->post('/user/login', 'UserController@postLogin');
$router->get('/user/signup', 'UserController@getSignup');
$router->post('/user/signup', 'UserController@create');
$router->get('/user/profile', 'UserController@show');
$router->get('/user/logout', 'UserController@getLogout');