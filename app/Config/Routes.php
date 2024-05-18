<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index');

$routes->group('register', function($routes){
    $routes->get('/', 'RegisterController::index');
    $routes->post('/', 'RegisterController::store');
});

$routes->group('login', function ($routes) {
    $routes->get('/', 'LoginController::index');
    $routes->post('/', 'LoginController::login');
    $routes->get('/login', 'AuthController::login');
    

});

/*Arsip Routes*/
$routes->get('/arsip', 'Arsip::index');
$routes->get('/arsip/create', 'Arsip::create');
$routes->post('/arsip/store', 'Arsip::store');
$routes->get('/arsip/edit/(:num)', 'Arsip::edit/$1');
$routes->post('/arsip/update', 'Arsip::update');
$routes->get('/arsip/delete/(:num)', 'Arsip::delete/$1');

$routes->group('logout', function ($routes) {
    $routes->get('/', 'LogoutController::index');
});