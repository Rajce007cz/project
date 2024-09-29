<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
$routes->get('prehled/(:any)', 'Main::getPrehled/$1');
$routes->get('rocnik/(:num)', 'Main::getRocnik/$1');