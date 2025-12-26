<?php

use CodeIgniter\Router\RouteCollection;
use Config\Services;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

/*
|--------------------------------------------------------------------------
| Router Setup
|--------------------------------------------------------------------------
*/
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(false);
$routes->setAutoRoute(false);

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
*/

// Home
$routes->get('/', 'Home::index');

/*
|--------------------------------------------------------------------------
| Barang
|--------------------------------------------------------------------------
*/
$routes->get('barang', 'Barang::index');
$routes->get('barang/new', 'Barang::new');
$routes->post('barang/create', 'Barang::create');
$routes->get('barang/edit/(:num)', 'Barang::edit/$1');
$routes->post('barang/update/(:num)', 'Barang::update/$1');
$routes->get('barang/delete/(:num)', 'Barang::delete/$1');

/*
|--------------------------------------------------------------------------
| Pelanggan
|--------------------------------------------------------------------------
*/
$routes->get('pelanggan', 'Pelanggan::index');
$routes->get('pelanggan/new', 'Pelanggan::new');
$routes->post('pelanggan/create', 'Pelanggan::create');
$routes->get('pelanggan/edit/(:num)', 'Pelanggan::edit/$1');
$routes->post('pelanggan/update/(:num)', 'Pelanggan::update/$1');
$routes->get('pelanggan/delete/(:num)', 'Pelanggan::delete/$1');

/*
|--------------------------------------------------------------------------
| Transaksi
|--------------------------------------------------------------------------
*/
$routes->get('transaksi', 'Transaksi::index');
$routes->get('transaksi/new', 'Transaksi::new');
$routes->post('transaksi/create', 'Transaksi::create');

$routes->get('transaksi/show/(:num)', 'Transaksi::show/$1');
$routes->get('transaksi/edit/(:num)', 'Transaksi::edit/$1');
$routes->post('transaksi/update/(:num)', 'Transaksi::update/$1');
$routes->get('transaksi/delete/(:num)', 'Transaksi::delete/$1');

/*
|--------------------------------------------------------------------------
| Detail Transaksi
|--------------------------------------------------------------------------
*/
$routes->get('detail-transaksi/(:num)', 'DetailTransaksi::byTransaksi/$1');
$routes->get('detail-transaksi/add/(:num)', 'DetailTransaksi::add/$1');
$routes->post('detail-transaksi/store', 'DetailTransaksi::store');
$routes->get('detail-transaksi/delete/(:num)', 'DetailTransaksi::delete/$1');


$routes->get('/', 'Home::index'); // Homepage langsung ke dashboard
