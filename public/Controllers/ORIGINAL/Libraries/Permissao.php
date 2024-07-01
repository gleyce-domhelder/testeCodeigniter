<?php

namespace App\Libraries;

use App\Models\Usuario_Perfil;
use App\Libraries\Menu;

class Permissao
{
    public static function setPermissao()
    {
        $session = session();
        $id_usuario = $session->get('userData')['ID'];
        $usuario_perfil = new Usuario_Perfil();
        $usuario_perfil = $usuario_perfil->obterPerfisDoUsuario($id_usuario);
        session()->set('perfils', $usuario_perfil);
        return Permissao::perfil();
    }
    public static function perfil()
    {
        $session = session();
        $perfil = $session->get('perfils');
        if (empty($perfil)) {
            $response = \Config\Services::response();
            $response->setStatusCode(404, 'Usuário sem Permissao');
        } else {
            foreach ($perfil as $perfils)
                $AllPerfils[] = $perfils;
            $session->set('permissao', $AllPerfils);
            return Menu::criarMenu($session->get('userData')['ID']);
        }
    }
}
