
Documento2.docx

1 / 4
TABELAS
_USUARIO
CREATE TABLE USUARIO(
 ID INT PRIMARY KEY IDENTITY(1,1),
 USUARIO_REDE VARCHAR(15) NOT NULL,
 EMAIL VARCHAR(50) NOT NULL,
 MATRICULA CHAR(6) NOT NULL,
 NOME VARCHAR(100) NOT NULL,  
 STATUS BIT NOT NULL CHECK (STATUS IN (0, 1)),
 CREATED_AT DATETIME DEFAULT GETDATE()
);
 
_CI_ROUTE
CREATE TABLE CI_ROUTE(
 ID INT PRIMARY KEY IDENTITY(1,1),
 ROTA VARCHAR(30) NOT NULL,
 ALIAS VARCHAR(15) NOT NULL,
 STATUS BIT NOT NULL CHECK (STATUS IN (0, 1)),
 VUID CHAR(32) NOT NULL,
 CREATED_AT DATETIME DEFAULT GETDATE()
);
 
_MENU
CREATE TABLE MENU(
 ID INT PRIMARY KEY IDENTITY(1,1),
 CI_ROUTE_ID INT NOT NULL,
 FOREIGN KEY (CI_ROUTE_ID) REFERENCES CI_ROUTE(ID),
 MENU_PAI_ID INT,
2 / 4
 FOREIGN KEY (MENU_PAI_ID) REFERENCES MENU(ID),
 MENU VARCHAR(20) NOT NULL,
 CREATED_AT DATETIME DEFAULT GETDATE(),
 STATUS BIT NOT NULL CHECK (STATUS IN (0, 1)),
 ICON_CLASS CHAR(20) NOT NULL,
 SLUG VARCHAR(20) NOT NULL,
 ORDEM_EXIBICAO INT NOT NULL
);
 
_MODULOS  
CREATE TABLE MODULOS(
 ID INT PRIMARY KEY IDENTITY(1,1),
 MENU_ID INT NOT NULL,
 FOREIGN KEY (MENU_ID) REFERENCES MENU(ID),
 MODULO VARCHAR(20) NOT NULL,
 CREATED_AT DATETIME DEFAULT GETDATE(),
 STATUS BIT NOT NULL CHECK (STATUS IN (0, 1))
);
 
_PERFIL
CREATE TABLE PERFIL(
 ID INT PRIMARY KEY IDENTITY(1,1),
 PERFIL INT NOT NULL,  
 STATUS BIT NOT NULL CHECK (STATUS IN (0, 1)),
 CREATED_AT DATETIME DEFAULT GETDATE()
);
 
_PERFIL_MODULO
3 / 4
CREATE TABLE PERFIL_MODULO(
 ID INT PRIMARY KEY IDENTITY(1,1),
 PERFIL_ID INT NOT NULL,  
 FOREIGN KEY (PERFIL_ID) REFERENCES PERFIL(ID),
 MODULO_ID INT NOT NULL,
 FOREIGN KEY(MODULO_ID) REFERENCES MODULOS(ID),
 VUID CHAR(32) NOT NULL,
 STATUS BIT NOT NULL CHECK (STATUS IN (0, 1)),
 CREATED_AT DATETIME DEFAULT GETDATE()
);
 
_USUARIO_PERFIL
CREATE TABLE USUARIO_PERFIL(
 ID INT PRIMARY KEY IDENTITY(1,1),
 USUARIO_ID INT NOT NULL,  
 FOREIGN KEY (USUARIO_ID) REFERENCES USUARIO(ID),
 PERFIL_ID INT NOT NULL,
 FOREIGN KEY(PERFIL_ID) REFERENCES PERFIL(ID),
 STATUS BIT NOT NULL CHECK (STATUS IN (0, 1)),
 CREATED_AT DATETIME DEFAULT GETDATE()
);
 
_LOG_ACESSO
CREATE TABLE LOG_ACESSO(
 ID INT PRIMARY KEY IDENTITY(1,1),
 USUARIO_ID INT,  
 FOREIGN KEY (USUARIO_ID) REFERENCES USUARIO(ID),
 USUARIO VARCHAR(30),
4 / 4
 ERRO VARCHAR(200) NOT NULL,
 COD_HTTP CHAR(3) NOT NULL,
 CREATED_AT DATETIME DEFAULT GETDATE()
);

https://domhelder-my.sharepoint.com/:w:/g/personal/d21565_academico_domhelder_edu_br/ESSGsFXBkU9JoxfR6NP7CDEBWbsu-qvKFcR_ZWCI6QEcDA?e=dbz7e9

Access to XMLHttpRequest at 'http://localhost:8000/api/login' from origin 'http://localhost:3000' has been blocked by CORS policy: Cannot parse Access-Control-Allow-Headers response header field in preflight response.



<h3>phpinfo() -> 
 PHP Extension	20230831
Zend Extension	420230831
Zend Extension Build	API420230831,NTS,VS16
PHP Extension Build	API20230831,NTS,VS16</h3>
<h1>Erro:</h1>
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

<h1>Resolução: port=1433</h1>

<h1>Erro:</h1>
CRITICAL - 2024-04-27 00:25:47 --> [Caused by] CodeIgniter\Database\Exceptions\DatabaseException: [Microsoft][ODBC Driver 17 for SQL Server][SQL Server]Nome de objeto 'Sesc.dbo.Usuário' inv�lido.
in SYSTEMPATH\Database\SQLSRV\Connection.php on line 484.
 1 SYSTEMPATH\Database\BaseConnection.php(722): CodeIgniter\Database\SQLSRV\Connection->execute()
 2 SYSTEMPATH\Database\BaseConnection.php(636): CodeIgniter\Database\BaseConnection->simpleQuery()
 3 SYSTEMPATH\Database\SQLSRV\Builder.php(632): CodeIgniter\Database\BaseConnection->query()
 4 SYSTEMPATH\Model.php(275): CodeIgniter\Database\SQLSRV\Builder->get()
 5 SYSTEMPATH\BaseModel.php(676): CodeIgniter\Model->doFindAll()
 6 APPPATH\Controllers\Home.php(10): CodeIgniter\BaseModel->findAll()
 7 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Home->index()
 8 SYSTEMPATH\CodeIgniter.php(509): CodeIgniter\CodeIgniter->runController()
 9 SYSTEMPATH\CodeIgniter.php(355): CodeIgniter\CodeIgniter->handleRequest()
10 SYSTEMPATH\Boot.php(312): CodeIgniter\CodeIgniter->run()
11 SYSTEMPATH\Boot.php(67): CodeIgniter\Boot::runCodeIgniter()
12 FCPATH\index.php(56): CodeIgniter\Boot::bootWeb()

'charset'      => 'utf8mb4',
        'DBCollat'     => 'utf8mb4_general_ci',
<h1>Resolução</h1>
'charset'      => 'utf8',
        'DBCollat'     => '',
        'swapPre'      => '',
