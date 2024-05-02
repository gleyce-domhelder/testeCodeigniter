<?php
namespace App\Models;
use CodeIgniter\Model;


class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey= 'idRoutes';
    protected $allowedFields = ['idRoutes', 'Nome', 'href', 'idCategoria'];
}