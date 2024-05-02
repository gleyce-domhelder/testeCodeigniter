<?php

namespace App\Controllers;
use App\Controllers\DadosTabela;
class Databases extends BaseController
{
    public function Dados()
    {
        $usuario = $this->Usuarios();
        $menu = $this->Menu();
        $submenu = $this->SubMenu();
        $permissao = 1;
        $permissao = $this->dadosUsuarios($usuario, $permissao);
        $menu = $this->criarMenu($menu, $submenu, $permissao);
        return $this->response->setJSON(['menuHtml' => $menu]);
    }

    public function dadosUsuarios($usuario, $permissao)
    {
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('password');
        return $this->verificacaoUsuarios($usuario, $email, $senha, $permissao);
    }

    public function verificacaoUsuarios($usuario, $email, $senha, $permissao)
    {
        foreach ($usuario as $usuarios) {
            if (trim($usuarios->email) === $email && trim($usuarios->senha) === $senha) {
                $permissao = $usuarios->idCategoria;
                return $permissao;
            }
        }
        return null;
    }
    public function criarMenu($menu, $submenu, $permissao)
    {
        $listMenu = '<ul class="menu-list">';
        $permissao = 1;
        foreach ($menu as $menus) {
            if ($menus->idCategoria === $permissao || $menus->idCategoria === 0) {
                $listMenu .= '<li class="menu-item">';
                $listMenu .= "<a class='menu-link' href='{$menus->href}'>" . $menus->Nome . "</a>";
                $hasSubmenu = false;
                foreach ($submenu as $submenus) {
                    if ($submenus->idMenu === $menus->idMenu) {
                        $hasSubmenu = true;
                        break;
                    }
                }
                if ($hasSubmenu) {
                    $listMenu .= '<ul class="submenu-list">';
                    foreach ($submenu as $submenus) {
                        if ($submenus->idMenu === $menus->idMenu) {
                            $listMenu .= '<li class="submenu-item">';
                            $listMenu .= "<a class='submenu-link' href='{$submenus->href}'>" . $submenus->Nome . "</a>";
                            $listMenu .= '</li>';
                        }
                    }
                    $listMenu .= '</ul>';
                }

                $listMenu .= '</li>';
            }
        }

        $listMenu .= '</ul>';
        return $listMenu;
    }
}
