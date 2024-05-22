<?php

namespace App\Models;
use App\Controllers\BaseController;
use App\Models\Submenu;
class Menu extends BaseController
{
    private $id;
    private $nome;
    private $idRoutes;
    private $icon;
    
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

    public function getIcon()
    {
        return $this->icon;
    }

    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    public function getAll()
    {
        $menu = $this->Buscar("SELECT * FROM MENU");
        return $menu;
    }
}

