<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

// CRUD Routes
// Tasks
$routes->get('tarefas', 'Tasks::index');
$routes->get('nova-tarefa', 'Tasks::create');
$routes->post('nova-tarefa', 'Tasks::store');
$routes->get('tarefas/(:num)', 'Tasks::singleUser/$1');
$routes->post('novo-tarefa/(:num)', 'Tasks::update/$1');
$routes->get('tarefa-delete/(:num)', 'Tasks::delete/$1');

// Categories
$routes->get('categorias', 'Categories::index');
$routes->get('nova-categoria', 'Categories::create');
$routes->post('nova-categoria', 'Categories::store');

$routes->get('nova-categoria/(:num)', 'Categories::singleUser/$1');
$routes->post('nova-categoria/(:num)', 'Categories::update/$1');
$routes->get('categoria-delete', 'Categories::delete');

// Responsibles
$routes->get('responsaveis', 'Responsibles::index');
$routes->get('novo-responsavel', 'Responsibles::create');
$routes->post('novo-responsavel', 'Responsibles::store');

$routes->get('responsaveis/(:num)', 'Responsibles::singleUser/$1');
$routes->post('novo-responsavel/(:num)', 'Responsibles::update/$1');
$routes->post('responsavel-delete/(:num)', 'Responsibles::delete/$1');


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
