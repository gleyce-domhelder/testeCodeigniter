<?php


namespace App\Models;

use CodeIgniter\Model;

class VW_Permissao extends Model
{
    protected $table = 'permissions_view'; // Nome da visualização no banco de dados

    // O método view retorna todos os dados da visualização
    public function view()
    {
        return $this->findAll();
    }
}
