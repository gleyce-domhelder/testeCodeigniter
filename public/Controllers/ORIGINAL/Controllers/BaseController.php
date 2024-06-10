<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
    public function Database()
    {
        $serverName = "LAPTOP-06ODSRH6"; // Substitua pelo nome do seu servidor
        $connectionOptions = [
            "Database" => "Sesc", // Substitua pelo nome do seu banco de dados
            "Uid" => "teste", // Substitua pelo seu nome de usuário
            "PWD" => "sesc2004ate", // Substitua pela sua senha
        ];

        // Estabelecer conexão
        $conn = sqlsrv_connect($serverName, $connectionOptions);

        return $conn;
    }
    public function Buscar($sql)
    {

        // Estabelecer conexão
        $conn = $this->Database();

        if ($conn === false) {
            die("Connection error: Unable to connect to the database.");
        }

        // Executar consulta
        $query = sqlsrv_query($conn, $sql);

        if ($query === false) {
            die("Query execution error: " . print_r(sqlsrv_errors(), true));
        }

        // Buscar resultados
        $rows = [];
        while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
            $rows[] = $row;
        }

        // Fechar conexão
        sqlsrv_close($conn);

        return $rows;
    }
    public function executarOperacao($tipoOperacao, $tabela, $dados)
    {
        $conn = $this->Database();

        if ($conn === false) {
            die("Connection error: Unable to connect to the database.");
        }

        switch ($tipoOperacao) {
            case 'insert':
                // Construir a consulta de inserção
                $sql = "INSERT INTO $tabela (";
                $sql .= implode(", ", array_keys($dados));
                $sql .= ") VALUES ('";
                $sql .= implode("', '", array_values($dados));
                $sql .= "')";

                break;
            case 'update':
                // Supondo que $dados inclua a condição WHERE para a atualização
                $sql = "UPDATE $tabela SET ";
                foreach ($dados as $coluna => $valor) {
                    $sql .= "$coluna = '$valor', ";
                }
                // Remover a vírgula extra no final
                $sql = rtrim($sql, ", ");
                break;
            case 'delete':
                // Supondo que $dados inclua a condição WHERE para a exclusão
                $sql = "DELETE FROM $tabela WHERE ";
                foreach ($dados as $coluna => $valor) {
                    $sql .= "$coluna = '$valor' AND ";
                }
                // Remover o "AND" extra no final
                $sql = rtrim($sql, "AND ");
                break;
            default:
                die("Invalid operation type: $tipoOperacao.");
        }

        // Executar a consulta
        $query = sqlsrv_query($conn, $sql);

        if ($query === false) {
            die("Query execution error: " . print_r(sqlsrv_errors(), true));
        }

        // Fechar conexão
        sqlsrv_close($conn);

        return sqlsrv_rows_affected($query) > 0;
    }
}
