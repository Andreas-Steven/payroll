<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Route for Page
$routes->get('/', 'Dashboard::index');
$routes->get('/gaji', 'Dashboard::indexGaji');
$routes->get('/hari', 'Dashboard::indexHari');
$routes->get('/slip', 'Dashboard::indexSlipGaji');

// Route for Backend Admin
$routes->post('/', 'Dashboard::create');
$routes->post('/print', 'Dashboard::print');
$routes->put('/update/(:segment)', 'Dashboard::update/$1');
$routes->delete('/delete/(:segment)', 'Dashboard::destroy/$1');

// Route for other backend
$routes->post('/masuk/(:segment)', 'AbsensiController::checkin/$1');
$routes->post('/pulang/(:segment)', 'AbsensiController::checkout/$1');
$routes->post('/print', 'Dashboard::print');