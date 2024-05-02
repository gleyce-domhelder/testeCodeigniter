<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->post('/api/login', 'Databases::Dados');
$routes->get('/api/login', 'Databases::Dados');

$routes->post('/api/banco', 'Databases::Usuarios');
$routes->get('/api/banco', 'Databases::Usuarios');