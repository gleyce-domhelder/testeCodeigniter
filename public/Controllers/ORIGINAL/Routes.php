<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('api', function (RouteCollection $routes) {
    $routes->post('login', 'Acesso::login');
    $routes->get('login', 'Acesso::login');

    $routes->get('usuarios', 'Imprimir::dados');

    $routes->get('cadastrar', 'Imprimir::cadastrar');
    $routes->post('cadastrar', 'Imprimir::cadastrar');

    $routes->post('deletar/(:num)', 'Imprimir::deletar/$1');
});

$routes->group('permissaoAcesso', function (RouteCollection $routes) {
    // Defina as rotas relacionadas ao controller PermissaoAcessoController aqui
    $routes->get('listarPermissoesUsuario/(:num)', 'Permissao::listarPermissoesUsuario/$1');
    $routes->post('listarPermissoesUsuario/(:num)', 'Permissao::listarPermissoesUsuario/$1');
    
    $routes->get('modulos', 'Permissao::modulos');

    $routes->get('gerarMenu/(:num)', 'Menu::criarMenu/$1');
    $routes->post('gerarMenu/(:num)', 'Menu::criarMenu/$1', ['alias'=>'logacesso','filter' => 'logacesso']);
});

$routes->group('erro', function (RouteCollection $routes) {
    // Defina as rotas relacionadas ao controller PermissaoAcessoController aqui
    $routes->get('erro1)', 'Erro::erro');
    $routes->post('erro1)', 'Erro::erro');
});


$routes->group('listar', function (RouteCollection $routes) {
    // Defina as rotas relacionadas ao controller PermissaoAcessoController aqui
    $routes->get('perfil', 'Buscar::Perfil');
});
