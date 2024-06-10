<?php

namespace App\Controllers;

use App\Models\Usuario;

class Databases extends BaseController
{
    public function dados()
    {
        $usuario = new Usuario();
        $menu = new Menu();

        $usuarioEncontrado = $this->verificacaoUsuarios($usuario, 'joao@example.com', 'senha123');
        if ($usuarioEncontrado) {
            $menuHtml = $menu->criarMenu();
            return $this->response->setJSON(['menuHtml' => $menuHtml]);
        } else {
            // Handle user not found
        }
    }

    public function verificacaoUsuarios(Usuario $usuario, $email, $senha)
    {
        $usuarios = $usuario->getAll();
        
        foreach ($usuarios as $usuario) {
            if (trim($usuario->getEmail()) === $email && trim($usuario->getSenha()) === $senha) {
                return true;
            }
        }
        return false;
    }
}
