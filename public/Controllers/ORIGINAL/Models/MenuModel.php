<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'MENU'; // Assuming 'MENU' is the table name
    protected $primaryKey = 'id'; // Assuming 'id' is the primary key
    protected $allowedFields = ['nome', 'idRoutes', 'icon']; // Assuming these are the allowed fields

    public function getAllMenus()
    {
        return $this->findAll();
    }

    public function imprimir()
    {
        $menus = $this->getAllMenus();

        // Set session data for menus
        session()->set('menu', $menus);
    }
    function findsMenuById($menuId) {
        $menus = $this->findAll();
        foreach ($menus as $menu) {
            if ($menu['ID'] == $menuId) {
                return $menu;
            }
        }
        return null;
    }
}
