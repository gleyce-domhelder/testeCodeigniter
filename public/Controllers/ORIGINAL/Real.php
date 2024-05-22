<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\MenuModel;
use App\Models\SubmenuModel;
use App\Models\UnidadeModel;
use App\Models\UsuarioModel;

class Real extends BaseController
{
    public function Dados()
    {
       
        echo  'ola';

        $usuarios = new UsuarioModel();
        $unidade = new UnidadeModel();
        $submenus = new SubmenuModel();
        $menus = new MenuModel();
        $categoria = new CategoriaModel();

        $permissao = 1;
        $data['usuarios'] = $usuarios->findAll();
        $data['unidade'] = $unidade->findAll();
        $data['submenus'] = $submenus->findAll();
        $data['menus'] = $menus->findAll();
        $menu = $this->criarMenu($data['menus'], $data['submenus'], $permissao);
        return $this->response->setJSON(['menuHtml' => $menu]);
    }

    public function dadosUsuarios($usuario, $permissao)
    {
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('password');
        return $this->verificacaoUsuarios($usuario, $email, $senha, $permissao);
    }

    public function verificacaoUsuarios($usuarios, $email, $senha, $permissao)
    {
        foreach ($usuarios as $usuario) {
            if ($email === $usuario['email'] && $senha === $usuario['senha']) {
                $permissao = $usuario['idCategoria'];
                return true;
            }
        }
        return false;
    }

    public function criarMenu($menus, $submenus, $permissao)
    {
        $listMenu = '<ul class="menu-list">';

        foreach ($menus as $menu) {
            if ($menu['idCategoria'] === $permissao || $menu['idCategoria'] === 0) {
                $listMenu .= '<li class="menu-item">';
                $listMenu .= "<a class='menu-link' href='{$menu['href']}'>" . $menu['Nome'] . "</a>";
                $hasSubmenu = false;
                foreach ($submenus as $submenu) {
                    if ($submenu['idMenu'] === $menu['idMenu']) {
                        $hasSubmenu = true;
                        break;
                    }
                }
                if ($hasSubmenu) {
                    $listMenu .= '<ul class="submenu-list">';
                    foreach ($submenus as $submenu) {
                        if ($submenu['idMenu'] === $menu['idMenu']) {
                            $listMenu .= '<li class="submenu-item">';
                            $listMenu .= "<a class='submenu-link' href='{$submenu['href']}'>" . $submenu['Nome'] . "</a>";
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
