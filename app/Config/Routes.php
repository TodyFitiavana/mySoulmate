<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Calculatrice::index');
// $routes->post('/', 'Calculatrice::calcule');
$routes->get('/home' ,'Home::index');
$routes->get('/about','Home::about');
$routes->get('/' ,'Publication::index');
$routes->get('/creation','Publication::creation');
$routes->post('/creation','Publication::creation');

// Routes des Authentifications
$routes->get('/auth', 'AuthController::index');
$routes->post('/auth/save', 'AuthController::save');
$routes->get('/signup', 'AuthController::signup');
$routes->post('/signup/auth', 'AuthController::sign');
$routes->get('/dashboard', 'DashController::show_users',['filter' => 'auth']);

// Deconnexion
$routes->get('/deconnection', 'AuthController::deconnexion',['filter' => 'auth']);

// Routes profile
$routes->get('/profile', 'ProfileController::show',['filter' => 'auth']);
$routes->post('/upload', 'ProfileController::misajour',['filter' => 'auth']);

// Routes chat
$routes->get('/chat', 'ChatController::show',['filter' => 'auth']);
$routes->get('/chat1/(:num)', 'ChatController::show_mess/$1',['filter' => 'auth']);
$routes->post('/message', 'ChatController::mess',['filter' => 'auth']);
$routes->get('/fetch-messages/(:num)', 'ChatController::fetchMessages/$1');

$routes->get('/show', 'DashController::show_users', ['filter' => 'auth']);