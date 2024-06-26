<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('LoginController');
$routes->setDefaultMethod('/');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->get('/', 'LoginController::index');
$routes->get('/dashboard', 'LoginController::cek_dashboard');
$routes->post('authentication', 'LoginController::cek_login');
$routes->get('/logout', 'LoginController::logout');


$routes->get('arsip', 'ArsipController::index');
$routes->get('arsip/create', 'ArsipController::create');
$routes->post('arsip/store', 'ArsipController::store');
$routes->get('arsip/edit/(:alphanum)', 'ArsipController::edit/$1');
$routes->post('arsip/update/(:num)', 'ArsipController::update/$1');
$routes->get('arsip/delete/(:alphanum)', 'ArsipController::delete/$1');
$routes->get('arsip/xls', 'ArsipController::xls');
$routes->get('arsip/pdf', 'ArsipController::pdf');

// Routing for users
$routes->get('users', 'UsersController::index');
$routes->get('users/create', 'UsersController::create');
$routes->post('users/store', 'UsersController::store');
$routes->get('users/edit/(:alphanum)', 'UsersController::edit/$1');
$routes->post('users/update/(:num)', 'UsersController::update/$1');
$routes->get('users/delete/(:alphanum)', 'UsersController::delete/$1');

$routes->get('pegawai', 'PegawaiController::index');
$routes->get('pegawai/create', 'PegawaiController::create');
$routes->post('pegawai/store', 'PegawaiController::store');
$routes->get('pegawai/edit/(:alphanum)', 'PegawaiController::edit/$1');
$routes->post('pegawai/update/(:num)', 'PegawaiController::update/$1');
$routes->get('pegawai/delete/(:alphanum)', 'PegawaiController::delete/$1');

$routes->get('dokumen', 'DokumenController::index');
$routes->get('dokumen/create', 'DokumenController::create');
$routes->post('dokumen/store', 'DokumenController::store');
$routes->get('dokumen/edit/(:alphanum)', 'DokumenController::edit/$1');
$routes->post('dokumen/update/(:num)', 'DokumenController::update/$1');
$routes->get('dokumen/delete/(:alphanum)', 'DokumenController::delete/$1');
$routes->get('dokumen/xls', 'DokumenController::xls');
$routes->get('dokumen/pdf', 'DokumenController::pdf');

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
