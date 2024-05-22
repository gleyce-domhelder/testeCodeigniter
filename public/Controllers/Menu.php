<?php

namespace App\Controllers;

use App\Models\SubmenuModel;
use App\Models\MenuModel;

class Menu extends BaseController
{
    public function criarMenu()
    {
        $menu = new MenuModel();
        $submenu = new SubmenuModel();
        $listMenu = '<nav class="navbar"><a href="#" class="logo">Meu Site</a><ul class="menu-list">';
        $permissao = 1;

        foreach ($menu as $menus) {
            if ($menus->ID === $permissao || $menus->ID === 0) {
                $listMenu .= '<li class="menu-item">';
                $listMenu .= "<a class='menu-link' href='{$menus->ID_ROUTES}'>" . $menus->NOME . "</a>";
                $listMenu .= $this->criarSubmenu($menus->ID, $submenu);
                $listMenu .= '</li>';
            }
        }

        $listMenu .= '</ul></nav>';
        return $listMenu;
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
