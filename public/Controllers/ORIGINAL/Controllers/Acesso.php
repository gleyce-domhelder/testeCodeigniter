<?php

namespace App\Controllers;

use App\Models\Usuario;

class Acesso extends BaseController
{
    public function validarEmail()
    {
        session()->start();
        // $email = $this->request->getPost('email');
        $email = 'gleycemartins@gmail.com';

        if (empty($email)) {
            return "Por favor, forneça um email.";
        }
        $usuarioModel = new Usuario();
        $usuarioModel->obterIdPorEmail($email);
        $id_usuario = session()->get('ID_USUARIO');
        if ($id_usuario) {
            return redirect()->to('http://localhost:8080/permissaoAcesso/listarPermissoesUsuario/'.$id_usuario);
        } else {
            return "O email '{$email}' não está cadastrado.";
        }
    }
}

?>
