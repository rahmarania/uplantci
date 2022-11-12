<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// bikin db
$routes->get('create-db', function () {
    $forge = \Config\Database::forge();
    if ($forge->createDatabase('uplant')) {
        echo 'Database created!';
    }
});

$routes->resource('api');

// ini d folder controller
$routes->get('/', 'Home::index');


// $routes->addRedirect('/','home');

$routes->get('home', 'home::index');

// tambah routes baru ke fungsi index tanaman.php
$routes->get('tanaman', 'Tanaman::index');
$routes->get('pie_chart', 'Chart::pie_chart_js');

// menuju tambah.php func create
$routes->get('tanaman/tambah', 'Tanaman::create');

// di tanaman panggil method store utk add data, method form nya post
$routes->post('tanaman', 'Tanaman::store');

// variabel 1 (satu) buat any
$routes->get('tanaman/edit/(:any)', 'Tanaman::edit/$1');
$routes->put('tanaman/(:segment)', 'Tanaman::update/$1');

// delete func destroy di controller
$routes->delete('tanaman/(:segment)', 'Tanaman::destroy/$1');

// export excel
$routes->get('tanaman/exportexc', 'Tanaman::exportexc');

// export pdf
$routes->get('tanaman/exportpdf', 'Tanaman::exportpdf');

// import excel
$routes->post('tanaman/import','Tanaman::import');
$routes->post('tanaman/impexc','Tanaman::impexc');


$routes->post('chart-perkat','Tanaman::show_perkat');




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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
