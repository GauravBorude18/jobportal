<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home Route
$routes->get('/', 'Home::index');

// User Routes
$routes->get('/register', 'User::register');
$routes->post('/user/process-register', 'User::processRegister');

$routes->get('/login', 'User::login');
$routes->post('/user/process-login', 'User::processLogin');

$routes->get('/dashboard', 'User::dashboard');
$routes->get('/user/logout', 'User::logout');
