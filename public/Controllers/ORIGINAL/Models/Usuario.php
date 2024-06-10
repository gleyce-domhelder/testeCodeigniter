<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuario extends Model
{
    protected $table = 'USUARIO';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['USUARIO_REDE', 'EMAIL', 'MATRICULA', 'NOME', 'STATUS'];

    public function obterIdPorEmail($email)
    {
        $user = $this->where('EMAIL', $email)->first();

        if ($user) {
            session()->set('ID_USUARIO',$user['ID']);
        } else {
            return null; // Return null if user with given email is not found
        }
    }

    public function cadastrarUsuario($usuario_rede, $email, $matricula, $nome, $status)
    {
        $data = [
            'usuario_rede' => $usuario_rede,
            'email' => $email,
            'matricula' => $matricula,
            'nome' => $nome,
            'status' => $status
        ];

        $this->insert($data);
        return $this->insertID();
    }

    public function deletarUsuario($id)
    {
        return $this->delete($id);
    }
}
