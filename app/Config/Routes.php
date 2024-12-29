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

$routes->get('product', 'Admin\ProductController::index');       // List all brands
    $routes->get('product/create', 'Admin\ProductController::create'); // Add new brand form
    $routes->post('product/store', 'Admin\ProductController::store');  // Save new brand
    $routes->get('product/edit/(:num)', 'Admin\ProductController::edit/$1'); // Edit brand form
    $routes->post('product/update/(:num)', 'Admin\ProductController::update/$1'); // Update brand
    $routes->get('product/delete/(:num)', 'Admin\ProductController::delete/$1');  // Delete brand

    $routes->get('model', 'Admin\ModelController::index');
    $routes->get('model/create', 'Admin\ModelController::create');
 $routes->post('model/store', 'Admin\ModelController::store');  
    $routes->get('model/view/(:num)', 'Admin\ModelController::view/$1');
    $routes->get('model/edit/(:num)', 'Admin\ModelController::edit/$1');
    $routes->post('model/update/(:num)', 'Admin\ModelController::update/$1');
    $routes->get('model/delete/(:num)', 'Admin\ModelController::delete/$1');
    $routes->get('model/delete-gallery-image/(:num)', 'Admin\ModelController::deleteGalleryImage/$1');

$routes->get('slider', 'Admin\SliderController::index');
$routes->get('slider/create', 'Admin\SliderController::create');
$routes->post('slider/store', 'Admin\SliderController::store');
$routes->get('slider/edit/(:num)', 'Admin\SliderController::edit/$1');
$routes->post('slider/update/(:num)', 'Admin\SliderController::update/$1');
$routes->post('slider/delete/(:num)', 'Admin\SliderController::delete/$1');




