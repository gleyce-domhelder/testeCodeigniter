<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuario_Perfil extends Model
{
    protected $table = 'USUARIO_PERFIL';
    protected $primaryKey = 'ID'; // Assuming 'id' is the primary key
    protected $allowedFields = ['USUARIO_ID', 'PERFIL_ID', 'STATUS'];

    public function obterPerfisDoUsuario($id_usuario)
    {
        return $this->where('USUARIO_ID', $id_usuario)->findColumn('PERFIL_ID');
    }

    public function inserirPerfil($id_usuario, $perfil)
    {
        $dados = [
            'USUARIO_ID' => $id_usuario,
            'PERFIL_ID' => $perfil,
            'STATUS' => 1
        ];

        if ($this->insert($dados)) {
            return true;
        } else {
            return false;
        }
    }
}
