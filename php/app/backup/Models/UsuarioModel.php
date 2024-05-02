<?php namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model {
    protected $table = 'Usuário';
    protected $primaryKey = 'idUsuário';
    protected $allowedFields = ['idUsuário', 'Nome', 'email', 'senha', 'idUnidade', 'idCategoria'];
}
?>
