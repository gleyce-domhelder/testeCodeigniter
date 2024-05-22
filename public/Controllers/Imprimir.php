<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Services\MenuService;

class Databases extends BaseController
{
    public function dados()
    {
        
        session_start();
        if (!isset($_SESSION['usuario'])) {
            return redirect()->to('/login');
        }
        
    }    
}
