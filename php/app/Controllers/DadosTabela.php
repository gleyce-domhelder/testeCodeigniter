<?php
namespace App\Controllers;
use CodeIgniter\Controller;


class DadosTabela extends BaseController{
    public function Usuarios()
    {
        $sql = "SELECT * FROM Usuário";
        return $this->BancodeDados($sql);
    }
    public function Menu()
    {
        $sql = "SELECT * FROM Menu";
        return $this->BancodeDados($sql);
    }
    public function SubMenu()
    {
        $sql = "SELECT * FROM SubMenu";
        return $this->BancodeDados($sql);
    }
}