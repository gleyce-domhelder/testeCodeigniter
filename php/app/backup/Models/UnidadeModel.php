<?php namespace App\Models;

use CodeIgniter\Model;

class UnidadeModel extends Model {
    protected $table = 'Unidade';
    protected $primaryKey = 'idUnidade';
    protected $allowedFields = ['idUnidade', 'Unidade'];
}
?>
