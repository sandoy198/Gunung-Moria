<?php

namespace Config;

use App\Filters\MyFilter;

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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['filter' => 'myfilter']);

$routes->group('/', ['filter' => 'myfilter'], function ($routes) {
    $routes->post('/show', 'Home::show');
    $routes->group('/SalesOrder', function ($routes) {
        $routes->get('', 'SalesOrder::index');
        $routes->get('create', 'SalesOrder::create');
        $routes->get('(:num)', 'SalesOrder::detail/$1');
        $routes->get('popupitem', 'SalesOrder::PopupItem');
        $routes->post('save', 'SalesOrder::Save');
    });
    $routes->group('/PurchasingOrder', function ($routes) {
        $routes->get('', 'PurchasingOrder::index');
        $routes->get('Create', 'PurchasingOrder::create');
        $routes->get('popupitem', 'PurchasingOrder::PopupItem');
        $routes->post('Save', 'PurchasingOrder::Save');
        $routes->get('Approval', 'PurchasingOrder::Approval');
        $routes->get('Detail/(:num)', 'PurchasingOrder::Detail/$1');
        $routes->post('Approve/(:num)', 'PurchasingOrder::Approve/$1');
        $routes->post('Reject/(:num)', 'PurchasingOrder::Reject/$1');
    });
    $routes->group('/Order', function ($routes) {
        $routes->get('', 'Order::index');
    });
    $routes->group('/ReceivingProduct', function ($routes) {
        $routes->get('', 'ReceivingProduct::index');
        $routes->get('Create', 'ReceivingProduct::Create');
        $routes->get('ReceiveDetail/(:num)', 'ReceivingProduct::ReceiveDetail/$1');
        $routes->post('Save/(:num)', 'ReceivingProduct::Save/$1');
    });
    $routes->group('/SendingOrder', function ($routes) {
        $routes->get('', 'SendingOrder::index');
        $routes->get('create', 'SendingOrder::create');
        $routes->get('CreateDetail/(:num)', 'SendingOrder::CreateDetail/$1');
        $routes->post('Save/(:num)', 'SendingOrder::Save/$1');
    });
    $routes->group('/Report', function ($routes) {
        $routes->get('', 'Home::index');
        $routes->get('PurchasingOrder', 'Report::PurchasingOrder');
        $routes->get('SendingOrder', 'Report::SendingOrder');
    });
    $routes->group('/item', function ($routes) {
        $routes->get('', 'Item::index');
        $routes->get('create', 'Item::create');
        $routes->post('save', 'Item::save');
        $routes->get('(:num)', 'Item::edit/$1');
        $routes->post('update/(:num)', 'Item::update/$1');
    });
    $routes->group('/Account', function ($routes) {
        $routes->get('detail/(:num)', 'Account::index/$1');
    });
});
service('auth')->routes($routes);

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