<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultController('Pages');

$routes->get('/', 'Pages::index');

  // This should be the main route
// OR 
//$routes->get('/', 'Home::index');  // Depending on what you want to load as the homepage
//$routes->get('(:any)', 'Pages::showme/$1');

// app/Config/Routes.php

$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('users', 'Admin\Users::index');
    $routes->get('settings', 'Admin\Settings::index');

});
$routes->get('dashboard', 'Admin\Dashboard::index');


$routes->post('auth/dologin', 'AuthController::doLogin');
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::loginPost');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::registerPost');
$routes->get('/logout', 'AuthController::logout');


    $routes->get('brands', 'Admin\BrandsController::index');       // List all brands
    $routes->get('brands/create', 'Admin\BrandsController::create'); // Add new brand form
    $routes->post('brands/store', 'Admin\BrandsController::store');  // Save new brand
    $routes->get('brands/edit/(:num)', 'Admin\BrandsController::edit/$1'); // Edit brand form
    $routes->post('brands/update/(:num)', 'Admin\BrandsController::update/$1'); // Update brand
    $routes->get('brands/delete/(:num)', 'Admin\BrandsController::delete/$1');  // Delete brand





