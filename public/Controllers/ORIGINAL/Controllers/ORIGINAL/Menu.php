<?php

namespace App\Controllers;

use App\Models\SubmenuModel;
use App\Models\MenuModel;
use App\Models\Usuario_Perfil;

class Menu extends BaseController
{
    public function criarMenu()
    {
        $usuario_perfil = new Usuario_Perfil();
        $permissao = $usuario_perfil->Imprimir();
        $permissao = $permissao[0];
        $menu = new MenuModel();
        $menu = $menu->Imprimir();
        // $submenu = new SubmenuModel();
        $listMenu = '<nav class="navbar"><a href="#" class="logo">Meu Site</a><ul class="menu-list">';
        foreach ($menu as $menus) {
            if ($menus->ID === $permissao || $menus->ID === 0) {
                $listMenu .= '<li class="menu-item">';
                $listMenu .= "<a class='menu-link' href='{$menus->ID_ROUTES}'>" . $menus->NOME . "</a>";
                $listMenu .= $this->criarSubmenu($menus->ID, 0);
                $listMenu .= '</li>';
            }
        }

        $listMenu .= '</ul></nav>';
        var_dump($permissao);
    }

    public function criarSubmenu($menuId, $submenu)
    {
        $list = '';
        $list .= '<ul class="submenu-list">';

        foreach ($submenu as $submenus) {
            if ($submenus->ID_MENU === $menuId) {
                $list .= '<li class="submenu-item">';
                $list .= "<a class='submenu-link' href='{$submenus->ID_ROUTES}'>" . $submenus->NOME . "</a>";
                $list .= '</li>';
            }
        }

        $list .= '</ul>';
        return $list;
    }
}
