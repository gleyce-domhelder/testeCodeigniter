<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\Usuario;
use App\Models\UsuarioModel;
use App\Services\MenuService;
use App\Models\Usuario_Perfil;

class Imprimir extends BaseController
{
    public function dados()
    {
        $usuarios = new Usuario();
        $usuarios = $usuarios->findAll();
        return $this->response->setJSON($usuarios);
    }
    public function cadastrar()
    {
        // Captura os dados do formulário
        $usuario_rede = $this->request->getPost('usuario_rede');
        $nome = $this->request->getPost('nome');
        $matricula = $this->request->getPost('matricula');
        $status = $this->request->getPost('status');
        $perfil = $this->request->getPost('opcao');
        $email = $this->request->getPost('email');


        // Cria uma instância do modelo de usuário
        $usuarioModel = new Usuario();
        $id = $usuarioModel->cadastrarUsuario($usuario_rede, $email, $matricula, $nome, $status);
        // Chama o método para cadastrar o usuário

        if ($id) {
            // Cria uma instância do modelo de perfil do usuário
            $perfilModel = new Usuario_Perfil();
            if (count($perfil) > 0) {
                foreach ($perfil as $perfils) {
                    $perfilModel->inserir($id, $perfils);
                }
            }
        } else {
            // Tratamento para falha no cadastro do usuário
            return "Falha ao cadastrar o usuário.";
        }
    }

    public function editar()
    {
        $usuarios = new Usuario();
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');
        $nome = $this->request->getPost('nome');
        // $email = 'maria@gmail.com';
        // $senha = '14111';
        // $nome = 'Mariana';
        // $usuarios = $usuarios->cadastrarUsuario($nome, $email, $senha);
        return $usuarios;
    }
    public function excluir($id)
    {
        $usuarios = new Usuario();
        $usuarios = $usuarios->deletar($id);
        return '$userId';
    }
}
