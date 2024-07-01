<?php

namespace App\Libraries;

use App\Models\MenuModel;
use App\Models\VW_Permissao;

class Menu
{
    public static function criarMenu($usuarioId)
    {
        // Inicializar o HTML do menu
        $listMenu = '<nav class="navbar"><a href="#" class="logo">Meu Site</a><ul class="menu-list">';

        // Instanciar o modelo de Menu
        $menuModel = new MenuModel();

        // Buscar todos os menus
        $menu = $menuModel->findAll();

        // Verificar se existem menus para iterar
        if ($menu) {
            foreach ($menu as $menus) {
                // Verificar se o usuário tem permissão para este menu
                if (Menu::temPermissao($menus['ID'], $usuarioId)) {
                    // Adicionar o link do menu principal
                    $listMenu .= "<li class='menu-item'><a class='menu-link' href='{$menus['CI_ROUTE_ID']}'>{$menus['MENU']}</a>";

                    // Verificar se há submenus associados a este menu principal
                    $submenus = $menuModel->where('MENU_PAI_ID', $menus['ID'])->findAll();
                    if ($submenus) {
                        $listMenu .= '<ul>';
                        foreach ($submenus as $submenu) {
                            // Verificar se o usuário tem permissão para este submenu
                            if (Menu::temPermissao($submenu['ID'], $usuarioId)) {
                                $listMenu .= "<li class='submenu-item'><a class='submenu-link' href='{$submenu['CI_ROUTE_ID']}'>{$submenu['MENU']}</a></li>";
                            }
                        }
                        $listMenu .= '</ul>';
                    }

                    $listMenu .= '</li>';
                }
            }
        }

        // Fechar as tags HTML
        $listMenu .= '</ul></nav>';
        $response = \Config\Services::response();
        // Retornar o HTML do menu como JSON
        return $response->setJSON(['menu' => $listMenu]);
    }

    private static function temPermissao($menuId, $usuarioId)
    {
        // Verificar se o usuário tem permissão para acessar o menu específico
        $vw_permissao = new VW_Permissao();
        $view = $vw_permissao->view($usuarioId);

        foreach ($view as $views) {
            if ($views['IDUSUARIO'] == $usuarioId && $views['MENUID'] === $menuId) {
                return true;
            }
        }

        return false;
    }
}
