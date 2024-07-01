<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Usuario_Perfil;
use App\Libraries\Autenticar;
use App\Libraries\Hash;
use Exception;

class Acesso extends BaseController
{
    public function login()
    {
        session()->destroy();
        if ($this->request->getMethod() !== 'post') {
            // Filtra e valida os dados do formulário
            $usuario = new Usuario();
            $userInfo = $usuario->where('USUARIO_REDE', 'adm')->first();
            // $checkPassword = Hash::make($this->request->getPost('password'), $userInfo['password']);
            $id_usuario = $userInfo['ID'];
            if (!$id_usuario) {
                return redirect()->to('http://localhost:3000/login')->setStatusCode(401, 'O email não cadastrado ou Credenciais Inválidas!!');
            }
            return Autenticar::setAutenticar($userInfo);
            // return redirect()->to('./listarPermissoesUsuario/' . $id_usuario);
            
        } else {
            return 404;
        }
    }

}
