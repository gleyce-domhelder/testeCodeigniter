<?php

namespace App\Models;

use App\Controllers\BaseController;

class SubMenu extends BaseController
{
    private $id;
    private $nome;
    private $idRoutes;
    private $idMenu;
    
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

    public function getIdRoutes()
    {
        return $this->idRoutes;
    }

    public function setIdRoutes($idRoutes)
    {
        $this->idRoutes = $idRoutes;
    }

    public function getIdMenu()
    {
        return $this->idMenu;
    }

    public function setIdMenu($idMenu)
    {
        $this->idMenu = $idMenu;
    }

    public function getAll()
    {
        $submenu = $this->Buscar("SELECT * FROM SUBMENU");
        return $submenu;
    }
}
?>
