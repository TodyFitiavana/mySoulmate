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


