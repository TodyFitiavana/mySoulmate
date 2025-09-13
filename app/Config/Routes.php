<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('/' ,'Utilisateur::index');
// $routes->get('/about','Home::about');
$routes->get('/(:num)/publication' ,'Publication::index/$1');
$routes->get('/(:num)' ,'Publication::allPublication/$1');
$routes->get('/(:num)/creation','Publication::creation/$1');
$routes->post('/(:num)/creation','Publication::creation/$1');


