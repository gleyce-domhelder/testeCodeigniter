<?php

namespace App\Filters;

use App\Models\Log_Acesso;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LogAcesso implements FilterInterface
{
    private $session;
    private $uri;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->uri = \Config\Services::uri();
    }
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

        $id_usuario = session()->get('ID_USUARIO');
        $email = session()->get('EMAIL'); // Altere para o nome correto da variável de sessão do email


        $log = new Log_Acesso();
        // $currentRoute = $this->uri->getSegment(1); // Get the current route (e.g., "api", "login", etc.)
        // $lastRoute = end($this->uri->getSegments());
        $currentStatusCode = $response->getStatusCode();
        $statusCodeTexts = [
            200 => 'OK',
            404 => 'Not Found',
            500 => 'Internal Server Error',
            // Adicione outros códigos de status conforme necessário
        ];
        $errorMessage = isset($statusCodeTexts[$currentStatusCode]) ? $statusCodeTexts[$currentStatusCode] : '';

        $log->insert([
            'USUARIO_ID' => $id_usuario,
            'USUARIO' => $email,
            'ERRO' => $errorMessage,
            'COD_HTTP' => $currentStatusCode,
            'CREATED_AT' => date('Y-m-d H:i:s'),
        ]);
    }
}
