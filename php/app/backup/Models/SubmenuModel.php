<?php 
namespace App\Models;
use CodeIgniter\Model;

class SubmenuModel extends Model{
    protected $table = 'SubMenu';
    protected $primaryKey = 'idSubmenu';
    protected $allowedFields = ['idSubmenu', 'Nome', 'idRoutes', 'idMenu'];
}