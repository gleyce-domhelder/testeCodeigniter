<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Usuario_Perfil;


class Permissao extends BaseController
{
    public function listarPermissoesUsuario($id_usuario)
    {
        $usuario = $id_usuario;
        if (!$usuario) {
            return "Usuário não encontrado.";
        }

        $usuarioPerfilModel = new Usuario_Perfil();
       
        $perfil =  $usuarioPerfilModel->obterPerfisDoUsuario($usuario);
        foreach ($perfil as $perfis) {
            $permissoes[] = $perfis;
        }
        session()->set('permissao', $permissoes);
        if (empty($permissoes)) {
            return redirect()->to('http://localhost:8080/erro/erro1' . $id_usuario);
        } else
            return redirect()->to('http://localhost:8080/permissaoAcesso/gerarMenu/'. $id_usuario);
    }

    // public function listarPermissoes($id_usuario, $permissao)
    // {
    //     $usuarioModel = new Usuario();
    //     $usuario = $usuarioModel->getUsuarioById($id_usuario);

    //     if (!$usuario) {
    //         return false;
    //     }

    //     $usuarioPerfilModel = new UsuarioPerfil();
    //     $perfis = $usuarioPerfilModel->getPerfisUsuario($id_usuario);

    //     foreach ($perfis as $perfil) {
    //         if ($perfil['permissao'] === $permissao) {
    //             return true;
    //         }
    //     }

    //     return false;
    // }
}
