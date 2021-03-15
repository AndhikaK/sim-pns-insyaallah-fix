<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->group('login', ['filter' => 'Preventlogin'], function ($routes) {
	$routes->add('/', 'login::index');
});

$routes->group('user', ['filter' => 'Userauth'], function ($routes) {
	$routes->add('/', 'User\UserHome::index');
});

$routes->group('admin', ['filter' => 'Auth'], function ($routes) {
	$routes->add('/', 'Admin\Beranda::index');
	$routes->add('test', 'Admin\AdminHome::test');

	$routes->add('lihat_pegawai', 'Admin\Lihatpegawai::index');
	// $routes->add('lihat_pegawai/(:any)', 'Admin\Lihatpegawai::index/$1');
	$routes->add('lihat_pegawai?(:any)', 'Admin\Lihatpegawai::index/$1');

	$routes->add('tambah_pegawai', 'Admin\Tambahpegawai::index');

	$routes->add('edit_bio/(:any)', 'Admin\Editdetail::bio/$1');
	$routes->add('edit_pdd/(:any)', 'Admin\Editdetail::tambahpdd/$1');
	$routes->add('tambah_pdd/(:any)', 'Admin\Editdetail::tambahdatapdd/$1');
	$routes->add('keluarga/(:any)', 'Admin\Editdetail::keluarga/$1');


	$routes->add('edit_dikum/(:any)', 'Admin\Editdetail::bio/$1');
	$routes->add('edit_dikbangum/(:any)', 'Admin\Editdetail::bio/$1');
	$routes->add('edit_dikbangspes/(:any)', 'Admin\Editdetail::bio/$1');
	$routes->add('edit_dikpol/(:any)', 'Admin\Editdetail::bio/$1');
	$routes->add('edit_keluarga/(:any)', 'Admin\Editdetail::bio/$1');


	$routes->add('delete_pegawai/(:any)', 'Admin\Lihatpegawai::deletePegawai/$1');
	$routes->add('detail_pegawai/(:any)', 'Admin\Detailpegawai::index/$1');
	$routes->add('data_master/(:any)', 'Admin\Datamaster::index/$1');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
