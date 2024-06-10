<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\VW_Permissao;

class Menu extends BaseController
{
    public function criarMenu($usuarioId)
{
    // Obter as permissões do usuário
    $vw_permissao = new VW_Permissao();
    $menuModel = new MenuModel();

    // Buscar os menus e permissões
    $menu = $menuModel->findAll();
    $view = $vw_permissao->view();

    // Inicializar o HTML do menu
    $listMenu = '<nav class="navbar"><a href="#" class="logo">Meu Site</a><ul class="menu-list">';

    // Iterar sobre as permissões
    foreach ($view as $views) {
        if ($views['Usuario_id'] == $usuarioId) {
            foreach ($menu as $menus) {
                if ($views['MENU_PAI_ID'] === $menus['ID']) {
                    $listMenu .= "<li class='menu-item'><a class='menu-link' href='{$menus['CI_ROUTE_ID']}'>{$menus['MENU']}</a>";
                    $listMenu .= '<ul>';

                    // Adicionar submenus
                    $listMenu .= $this->submenu($views['IdMenu'], $view, $menu);

                    $listMenu .= '</li>';
                }
            }
        }
    }
    // Fechar as tags HTML
    $listMenu .= '</ul></nav>';

    // Retornar o HTML do menu como JSON
    return $this->response->setJSON(['menu' => $listMenu]);
}

public function submenu($menuId, $view, $menu)
{
    $submenuHtml = '';
    foreach ($view as $views) {
        foreach ($menu as $menus) {
            if ($menus['MENU_PAI_ID'] === $menuId && $views['IdMenu'] === $menus['ID']) {
                // Adicionar o submenu ao HTML
                $submenuHtml .= "<li class='submenu-item'><a class='submenu-link' href='{$menus['CI_ROUTE_ID']}'>{$menus['NOME']}</a></li>";
            }
        }
    }

    return $submenuHtml;
}
}