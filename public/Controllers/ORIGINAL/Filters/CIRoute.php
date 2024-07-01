<?php

namespace App\Filters;
use App\Models\Log_Acesso;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\VW_Permissao;
class CIRoute implements FilterInterface
{
    
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
       
        $vw = new VW_Permissao();
        $vw->where('id_usuario', session('id_usuario'));
        
        
    }
}