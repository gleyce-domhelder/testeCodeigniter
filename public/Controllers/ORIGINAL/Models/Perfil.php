<?php

namespace App\Models;

use CodeIgniter\Model;

class Perfil extends Model
{
    protected $table = 'PERFIL'; // Assuming 'PERFIL' is the table name
    protected $primaryKey = 'id'; // Assuming 'id' is the primary key
    protected $allowedFields = ['PERFIL'];

    public function imprimir()
    {
        $this->findAll();
    }
}
