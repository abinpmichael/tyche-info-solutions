<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/', 'Pages::showme');  // This will redirect to 'Pages::showme' method
$routes->get('(:any)', 'Pages::showme/$1');  // This will map other pages to the showme method


$routes->setAutoRoute(true);



