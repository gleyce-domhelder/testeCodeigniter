<?php

namespace App\Models;

use App\Controllers\BaseController;

class Usuario extends BaseController
{
    private $id;
    private $email;
    private $senha;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getAll()
    {
        $usuario = $this->Buscar("SELECT * FROM USUARIO");
        return $usuario;
    }
}
?>
