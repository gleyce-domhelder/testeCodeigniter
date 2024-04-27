
#erro:
CRITICAL - 2024-04-27 00:22:09 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [SQLSRV]: [Microsoft][ODBC Driver 17 for SQL Server]Erro de protocolo no fluxo TDS SQLSTATE: HY000, code: 0
[Microsoft][ODBC Driver 17 for SQL Server]O cliente n�o pode estabelecer conex�o devido a falha de pr�-logon SQLSTATE: 08001, code: 0
[Method: GET, Route: /]
in SYSTEMPATH\Database\BaseConnection.php on line 457.
 1 SYSTEMPATH\Database\BaseConnection.php(604): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH\Database\SQLSRV\Builder.php(632): CodeIgniter\Database\BaseConnection->query()
 3 SYSTEMPATH\Model.php(275): CodeIgniter\Database\SQLSRV\Builder->get()
 4 SYSTEMPATH\BaseModel.php(676): CodeIgniter\Model->doFindAll()
 5 APPPATH\Controllers\Home.php(10): CodeIgniter\BaseModel->findAll()
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Home->index()
 7 SYSTEMPATH\CodeIgniter.php(509): CodeIgniter\CodeIgniter->runController()
 8 SYSTEMPATH\CodeIgniter.php(355): CodeIgniter\CodeIgniter->handleRequest()
 9 SYSTEMPATH\Boot.php(312): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(67): CodeIgniter\Boot::runCodeIgniter()
11 FCPATH\index.php(56): CodeIgniter\Boot::bootWeb()
