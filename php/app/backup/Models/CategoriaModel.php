<?php namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model {
    protected $table = 'Categoria';
    protected $primaryKey = 'idCategoria';
    protected $allowedFields = ['idCategoria', 'Nome'];
}
?>
