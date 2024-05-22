<?php

namespace App\Models;

use App\Controllers\BaseController;

class Perfil extends BaseController
{
    private $id;
    private $nome;
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getAll()
    {
        $permissao = $this->Buscar("SELECT * FROM PERFIL");
        return $permissao;
    }
}
?>
