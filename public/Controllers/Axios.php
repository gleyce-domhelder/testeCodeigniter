<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Services\MenuService;

class Axios extends BaseController
{
    public function Usuario()
    {
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');
    }    
}
