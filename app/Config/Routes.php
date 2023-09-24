<?php

use CodeIgniter\Router\RouteCollection;


/**saveSong
 * @var RouteCollection $routes
 */
$routes->get('/', 'MainController::index');
$routes->post('saveSong','MainController::saveSong');

