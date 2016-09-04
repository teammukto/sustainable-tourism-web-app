<?php

/**
 * all the application routes go here
 */

$router->get('/', 'HomeController@index');
$router->get('/single', 'HomeController@showSingle');

// all routes related to user
$router->get('/user/login', 'UserController@getLogin');
$router->post('/user/login', 'UserController@postLogin');
$router->get('/user/signup', 'UserController@getSignup');
$router->post('/user/signup', 'UserController@create');
$router->get('/user/profile', 'UserController@show');
$router->get('/user/logout', 'UserController@getLogout');

// all routes related to place
$router->get('/places', 'PlaceController@index');
$router->get('/places/(\d+)', 'PlaceController@show');
$router->post('/places/(\d+)', 'PlaceController@postReview');
$router->get('/places/create', 'PlaceController@getCreate');
$router->post('/places/create', 'PlaceController@postCreate');