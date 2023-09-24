<?php

use CodeIgniter\Router\RouteCollection;


/**saveSong
 * @var RouteCollection $routes
 */
$routes->get('/', 'MainController::index');
$routes->post('saveSong','MainController::saveSong');
$routes->get('/searchSong','MainController::searchSong');
$routes->post('createPlaylist','MainController::createPlaylist');
$routes->get('/playlists/(:any)','MainController::playlists/$1');
$routes->post('savePlaylist', 'MainController::savePlaylist');

