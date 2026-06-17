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
    $routes->get('dashboard', 'Admin\Dashboard::index');
    $routes->get('users', 'Admin\Users::index');
    $routes->get('settings', 'Admin\Settings::index');
});

$routes->post('auth/dologin', 'AuthController::doLogin');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::loginPost');
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::registerPost');
$routes->get('logout', 'AuthController::logout');

// Public Pages Routes
$routes->get('about-us', 'Pages::aboutUs');
$routes->get('laptops', 'Pages::laptops');
$routes->get('desktops', 'Pages::desktops');
$routes->get('services', 'Pages::services');
$routes->get('contact-us', 'Pages::contactUs');
$routes->get('terms-conditions', 'Pages::termsConditions');
$routes->get('privacy-policy', 'Pages::privacyPolicy');
$routes->get('enquire-now', 'Pages::enquireNow');
$routes->post('submit-enquiry', 'Pages::submitEnquiry');

// Cart Routes
$routes->get('cart', 'Pages::cart');
$routes->get('cart/add/(:num)', 'Pages::cartAdd/$1');
$routes->get('cart/remove/(:num)', 'Pages::cartRemove/$1');
$routes->post('cart/update', 'Pages::cartUpdate');

// Admin Routes protected by Auth filter
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
    
    $routes->get('brands', 'Admin\BrandsController::index');       // List all brands
    $routes->get('brands/create', 'Admin\BrandsController::create'); // Add new brand form
    $routes->post('brands/store', 'Admin\BrandsController::store');  // Save new brand
    $routes->get('brands/edit/(:num)', 'Admin\BrandsController::edit/$1'); // Edit brand form
    $routes->post('brands/update/(:num)', 'Admin\BrandsController::update/$1'); // Update brand
    $routes->get('brands/delete/(:num)', 'Admin\BrandsController::delete/$1');  // Delete brand

    $routes->get('product', 'Admin\ProductController::index');       // List all products
    $routes->get('product/create', 'Admin\ProductController::create'); // Add new product form
    $routes->post('product/store', 'Admin\ProductController::store');  // Save new product
    $routes->get('product/edit/(:num)', 'Admin\ProductController::edit/$1'); // Edit product form
    $routes->post('product/update/(:num)', 'Admin\ProductController::update/$1'); // Update product
    $routes->get('product/delete/(:num)', 'Admin\ProductController::delete/$1');  // Delete product

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
    $routes->get('slider/delete/(:num)', 'Admin\SliderController::delete/$1');

    $routes->get('home', 'Admin\HomeController::index');
    $routes->get('home/create', 'Admin\HomeController::create');
    $routes->post('home/store', 'Admin\HomeController::store');
    $routes->get('home/edit/(:num)', 'Admin\HomeController::edit/$1');
    $routes->post('home/update/(:num)', 'Admin\HomeController::update/$1');
    $routes->get('home/delete/(:num)', 'Admin\HomeController::delete/$1');

    $routes->get('about', 'Admin\AboutController::index');
    $routes->post('about/update/(:num)', 'Admin\AboutController::update/$1');
    
    $routes->get('terms-admin', 'Admin\TermsController::index');
    $routes->post('terms-admin/update/(:num)', 'Admin\TermsController::update/$1');
    
    $routes->get('privacy-admin', 'Admin\PrivacyController::index');
    $routes->post('privacy-admin/update/(:num)', 'Admin\PrivacyController::update/$1');
    
    // Enquiries Admin
    $routes->get('enquiries', 'Admin\EnquiriesController::index');
    $routes->get('enquiries/view/(:num)', 'Admin\EnquiriesController::view/$1');
    $routes->get('enquiries/delete/(:num)', 'Admin\EnquiriesController::delete/$1');

    // Services Admin CRUD
    $routes->get('services-admin', 'Admin\ServicesController::index');
    $routes->get('services-admin/create', 'Admin\ServicesController::create');
    $routes->post('services-admin/store', 'Admin\ServicesController::store');
    $routes->get('services-admin/edit/(:num)', 'Admin\ServicesController::edit/$1');
    $routes->post('services-admin/update/(:num)', 'Admin\ServicesController::update/$1');
    $routes->get('services-admin/delete/(:num)', 'Admin\ServicesController::delete/$1');

    // Password Change Admin
    $routes->get('admin/change-password', 'Admin\PasswordController::index');
    $routes->post('admin/change-password/update', 'Admin\PasswordController::update');

    // Email Notification Settings
    $routes->get('email-settings', 'Admin\EmailSettingsController::index');
    $routes->post('email-settings/update', 'Admin\EmailSettingsController::update');

    // SEO Admin CMS
    $routes->get('seo-admin', 'Admin\SeoController::index');
    $routes->get('seo-admin/create', 'Admin\SeoController::create');
    $routes->post('seo-admin/store', 'Admin\SeoController::store');
    $routes->get('seo-admin/edit/(:num)', 'Admin\SeoController::edit/$1');
    $routes->post('seo-admin/update/(:num)', 'Admin\SeoController::update/$1');
});

// Dynamic Product resolving (e.g. dell-latitude-3540)
$routes->get('(:any)', 'Pages::viewModel/$1');





