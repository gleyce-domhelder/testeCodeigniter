<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'Menu';
    protected $primaryKey = 'idMenu';
    protected $allowedFields = ['idMenu', 'Nome', 'idRoutes', 'href','IdCategoria'];
}
