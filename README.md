
  
  
  
  
  
  
  
  
  
  <React.StrictMode>
    <BrowserRouter>
      <Rotas />
    </BrowserRouter>
  </React.StrictMode>
import { useState, useEffect } from 'react';
import { Navigate, useNavigate } from 'react-router-dom';
import ModuleService from './CheckPermissions';

const CIRoute = ({ children, routeKey }) => {
  const navigate = useNavigate();
  const { modules, loading, error } = ModuleService();

  if (loading) {
    return <div>Carregando...</div>;
  }

  const hasPermission = (routeKey) => {
    return modules;
  }




  console.log(hasPermission(routeKey));
};

export default CIRoute;
import axios from 'axios';
import { useState, useEffect } from 'react';
const API_URL = 'http://localhost:8000/api/modulo';

const ModuleService = () => {
  const [modules, setModules] = useState([]);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(null);

  const fetchModules = async () => {
    try {
      setLoading(true);
      const response = await axios.get(API_URL);
      const data = response.data;
      const allowedKeys = data.map((item) => item.ID)
      setModules(allowedKeys);
      localStorage.setItem('modules', JSON.stringify(data));
    } catch (error) {
      setError(error);
      console.error('Erro ao buscar módulos:', error);
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    if (!localStorage.getItem('modules')) {
      fetchModules();
    } else {
      const storedUsers = localStorage.getItem('modules');
      setModules(JSON.parse(storedUsers));
    }
  }, []);

  return { modules, loading, error };
};

export default ModuleService;

<Routes>
        {routes.map((route) => (
          <Route
            key={route.key}
            path={route.path}
            element={
              <CIRoute routeKey={route.key}>
                {route.element}
              </CIRoute>
            }
          />
        ))}
  
  
  import React, { useEffect, useState } from 'react';
import axios from 'axios';

 CadastrarPerfil({ api }) {
    const handleSubmit = (event) => {
        event.preventDefault();
        const formData = new FormData(event.target);
        const perfil = formData.get('perfil');
        const status = formData.get('status');
        api.post('perfil/cadastrar', formData);
    };

    const [modulos, setModulos] = useState([]);
    useEffect(() => {
        api.get('api/listar-modulos')
            .then(result => setModulos(result))
            .catch(error => console.error('Error:', error));
    }, []);

    const [menus, setMenus] = useState([]);
    useEffect(() => {
        api.get('api/listar-menus')
            .then(result => setMenus(result))
            .catch(error => console.error('Error:', error));
    }, []);

    const [selectedItems, setSelectedItems] = useState([]);

    const toggleCheckbox = (itemId) => {
        if (selectedItems.includes(itemId)) {
            setSelectedItems(selectedItems.filter(item => item !== itemId));
        } else {
            setSelectedItems([...selectedItems, itemId]);
        }
    };

    return (
        <div className="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title--large">Cadastrar Perfil</h4>
                </div>
                <div class="card-body">
                    <form onSubmit={handleSubmit}>
                        <div class="row">
                            <div className="col-xl-6 mb-3">
                                <label for="exampleFormControlInput1" className="form-label">Nome<span className="text-danger">*</span></label>
                                <input type="text" class="form-control" name='perfil' id='perfil' />
                            </div>
                            <div className="col-xl-6 mb-3">
                                <label className="form-label">Selecione um status:<span className="text-danger">*</span></label>
                                <select className="default-select style-1 form-control" id='status' name='status'>
                                    <option data-display="Select" disabled>Selecione uma opção</option>
                                    <option id='permissaoValue' value={1}>Ativo</option>
                                    <option id='permissaoValue' value={0}>Inativo</option>
                                </select>
                            </div>
                            <div key='' className="col-xl-6 mb-3">
                                <label className="form-label">Módulos:<span className="text-danger">*</span></label>
                                <br />
                                <input type="checkbox" id="check-all" onChange={(e) => checkAll(e.target)} />Selecione todos Módulos
                            </div>

                            <div className="row">
                                {menus.map((menu) => (
                                    <div class="col-xl-6 col-lg-12" id='form-modulos'>
                                        <div class="card-header">
                                            <h4 class="card-title" key={menu.ID}><input type="checkbox" name="" id="" onChange={(e) => check(e.target)} /> {menu.MENU}</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive active-projects style-1">
                                                <table id="empoloyees-tblwrapper" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th colSpan="2">{name}</th>
                                                            <th>
                                                                <input
                                                                    type="checkbox"
                                                                    onClick={() => {
                                                                        const checkboxes = document.querySelectorAll(`#${name} input[type="checkbox"]`);
                                                                        checkboxes.forEach(checkbox => checkbox.checked = !checkbox.checked);
                                                                    }}
                                                                />
                                                                Selecione todos
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id={name}>
                                                        {items.map(item => (
                                                            <tr key={item.id}>
                                                                <td>
                                                                    <input
                                                                        type="checkbox"
                                                                        id={item.id}
                                                                        onChange={() => toggleCheckbox(item.id)}
                                                                        checked={selectedItems.includes(item.id)}
                                                                    />
                                                                </td>
                                                                <td>{item.label}</td>
                                                            </tr>
                                                        ))}
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                ))}

                            </div>
                            <div>
                                <button class="btn btn-danger light ms-1">Cancel</button>
                                <button class="btn btn-primary me-1" >Submit</button>
                            </div>
                        </div>
                    </form>
                </div >
            </div >

        </div >
    );
}


const CadastrarPerfil = () => {
    // Exemplo de dados para cada tabela
    const perfis = [
      { id: 'perfil1', label: 'Perfil 1' },
      { id: 'perfil2', label: 'Perfil 2' },
      { id: 'perfil3', label: 'Perfil 3' },
    ];
  
    const unidades = [
      { id: 'unidade1', label: 'Unidade 1' },
      { id: 'unidade2', label: 'Unidade 2' },
      { id: 'unidade3', label: 'Unidade 3' },
    ];
  
    const usuarios = [
      { id: 'usuario1', label: 'Usuário 1' },
      { id: 'usuario2', label: 'Usuário 2' },
      { id: 'usuario3', label: 'Usuário 3' },
    ];
  
    const categorias = [
      { id: 'categoria1', label: 'Categoria 1' },
      { id: 'categoria2', label: 'Categoria 2' },
      { id: 'categoria3', label: 'Categoria 3' },
    ];
  
    const handleSubmit = (event) => {
      event.preventDefault();
      alert('Enviado!');
    };
  
    const handleReset = () => {
      const checkboxes = document.querySelectorAll('input[type="checkbox"]');
      checkboxes.forEach(checkbox => checkbox.checked = false);
    };
  
    return (
      <form onSubmit={handleSubmit}>
        <CheckBoxTable name="perfil" items={perfis} />
        <CheckBoxTable name="unidade" items={unidades} />
        <CheckBoxTable name="usuario" items={usuarios} />
        <CheckBoxTable name="categoria" items={categorias} />
  
        <button type="submit">Enviar</button>
        <button type="button" onClick={handleReset}>Cancelar</button>
      </form>
    );
  };
  
  export default CadastrarPerfil;


    
-> CheckAll
import React, { useState } from 'react';

const CheckBoxTable = ({ name, items }) => {
  const [selectedItems, setSelectedItems] = useState([]);

  const toggleCheckbox = (itemId) => {
    if (selectedItems.includes(itemId)) {
      setSelectedItems(selectedItems.filter(item => item !== itemId));
    } else {
      setSelectedItems([...selectedItems, itemId]);
    }
  };

  return (
    <table>
      <thead>
        <tr>
          <th colSpan="2">{name}</th>
          <th>
            <input
              type="checkbox"
              onClick={() => {
                const checkboxes = document.querySelectorAll(`#${name} input[type="checkbox"]`);
                checkboxes.forEach(checkbox => checkbox.checked = !checkbox.checked);
              }}
            />
            Selecione todos
          </th>
        </tr>
      </thead>
      <tbody id={name}>
        {items.map(item => (
          <tr key={item.id}>
            <td>
              <input
                type="checkbox"
                id={item.id}
                onChange={() => toggleCheckbox(item.id)}
                checked={selectedItems.includes(item.id)}
              />
            </td>
            <td>{item.label}</td>
          </tr>
        ))}
      </tbody>
    </table>
  );
};

const Check = () => {
  // Exemplo de dados para cada tabela
  const perfis = [
    { id: 'perfil1', label: 'Perfil 1' },
    { id: 'perfil2', label: 'Perfil 2' },
    { id: 'perfil3', label: 'Perfil 3' },
  ];

  const unidades = [
    { id: 'unidade1', label: 'Unidade 1' },
    { id: 'unidade2', label: 'Unidade 2' },
    { id: 'unidade3', label: 'Unidade 3' },
  ];

  const usuarios = [
    { id: 'usuario1', label: 'Usuário 1' },
    { id: 'usuario2', label: 'Usuário 2' },
    { id: 'usuario3', label: 'Usuário 3' },
  ];

  const categorias = [
    { id: 'categoria1', label: 'Categoria 1' },
    { id: 'categoria2', label: 'Categoria 2' },
    { id: 'categoria3', label: 'Categoria 3' },
  ];

  const handleSubmit = (event) => {
    event.preventDefault();
    alert('Enviado!');
  };

  const handleReset = () => {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => checkbox.checked = false);
  };

  return (
    <form onSubmit={handleSubmit}>
      <CheckBoxTable name="perfil" items={perfis} />
      <CheckBoxTable name="unidade" items={unidades} />
      <CheckBoxTable name="usuario" items={usuarios} />
      <CheckBoxTable name="categoria" items={categorias} />

      <button type="submit">Enviar</button>
      <button type="button" onClick={handleReset}>Cancelar</button>
    </form>
  );
};

export default Check;



-> Login

// authService.js

const apiUrl = 'http://localhost:3000/auth'; // Exemplo de URL do seu backend

export const login = async (username, password) => {
  try {
    const response = await fetch(`${apiUrl}/login`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ username, password }),
    });

    if (!response.ok) {
      throw new Error('Credenciais inválidas. Por favor, tente novamente.');
    }

    const data = await response.json();
    localStorage.setItem('token', data.token);
  } catch (error) {
    throw new Error(error.message);
  }
};

export const logout = () => {
  localStorage.removeItem('token');
};

export const isLoggedIn = () => {
  return !!localStorage.getItem('token');
};


// LoginComponent.js

import React, { useState } from 'react';
import { login } from './authService';

const LoginComponent = () => {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const [errorMessage, setErrorMessage] = useState('');

  const handleSubmit = async (event) => {
    event.preventDefault();

    try {
      await login(username, password);
      // Redirecionar para a página principal ou outra página após o login
      window.location.href = '/';
    } catch (error) {
      setErrorMessage(error.message);
    }
  };

  return (
    <div>
      <form onSubmit={handleSubmit}>
        <div>
          <label htmlFor="username">Username</label>
          <input
            type="text"
            id="username"
            value={username}
            onChange={(e) => setUsername(e.target.value)}
            required
          />
        </div>
        <div>
          <label htmlFor="password">Password</label>
          <input
            type="password"
            id="password"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
            required
          />
        </div>
        {errorMessage && <div className="error-message">{errorMessage}</div>}
        <button type="submit">Login</button>
      </form>
    </div>
  );
};

export default LoginComponent;


// PrivateRoute.js

import React from 'react';
import { Route, Redirect } from 'react-router-dom';
import { isLoggedIn } from './authService';

const PrivateRoute = ({ component: Component, ...rest }) => {
  return (
    <Route
      {...rest}
      render={(props) =>
        isLoggedIn() ? <Component {...props} /> : <Redirect to="/login" />
      }
    />
  );
};

export default PrivateRoute;


-> Filtrar Permissao 
import React from 'react';
import { BrowserRouter, Route, Routes, Link, Navigate } from 'react-router-dom';
import Login from './login';
import Menu from './menu';
import Inicial from './paginaInicial';
import Logout from './logout';
import User from '../Pages/UserList';
import Cadastrar from '../Pages/UserForm';
import Table from '../Pages/table-datatable-basic';
import Hora from '../Pages/table-hora';
import Cadastro from '../Pages/cadastro';
import Grafico from '../Pages/grafico';
import { checkAccess } from './apiModule'; // Importa a função de verificação de acesso

export default function ProtectedRoutes() {
  // Função para verificar se o usuário tem acesso à rota
  const canActivate = (path) => {
    return checkAccess(path); // Utiliza a função de verificação de acesso
  };

  // Componente de rota protegida que verifica o acesso antes de renderizar
  const ProtectedRoute = ({ path, element }) => {
    return canActivate(path) ? (
      <Route path={path} element={element} />
    ) : (
      <Navigate to="/login" />
    );
  };

  return (
    <BrowserRouter>
      <Routes>
        <ProtectedRoute path="/login" element={<Login />} />
        <ProtectedRoute path="/cadastro" element={<Cadastro />} />
        <ProtectedRoute path="/table" element={<Table />} />
        <ProtectedRoute path="/hora" element={<Hora />} />
        <ProtectedRoute path="/menu" element={<Menu />} />
        <ProtectedRoute path="/" element={<Inicial />} />
        <ProtectedRoute path="/grafico" element={<Grafico />} />
        <ProtectedRoute path="/listar" element={<User />} />
        <ProtectedRoute path="/logout" element={<Logout />} />
        <ProtectedRoute path="/cadastrar" element={<Cadastrar />} />
      </Routes>
    </BrowserRouter>
  );
}


// Exemplo de módulo de serviço para verificação de acesso
const checkAccess = (path) => {
  // Simulação de lógica de verificação de acesso
  const accessList = ['/login', '/cadastro', '/table', '/hora', '/', '/grafico', '/listar', '/logout', '/cadastrar'];

  return accessList.includes(path);
};

export { checkAccess };


import React from 'react';
import { Link } from 'react-router-dom';
import { canActivate } from '../utils/auth'; // Importa a função de verificação de acesso

const User = ({ userId }) => {
  return (
    <div>
      <h2>Detalhes do Usuário</h2>
      <p>UserID: {userId}</p>
      <ul>
        <li>Detalhe 1</li>
        <li>Detalhe 2</li>
        <li>Detalhe 3</li>
      </ul>
      {canActivate(`/editar/${userId}`) && (
        <button><Link to={`/editar/${userId}`}>Editar Usuário</Link></button>
      )}
    </div>
  );
};

export default User;


->Datatable Basic
import React, { useEffect, useRef } from 'react';
import $ from 'jquery';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'datatables.net-bs4/css/dataTables.bootstrap4.min.css';
import 'datatables.net-bs4/js/dataTables.bootstrap4.min.js';

const DataTableExample = () => {
  const tableRef = useRef(null);

  useEffect(() => {
    // Inicializa o DataTable
    const table = $(tableRef.current).DataTable({
      searching: false, // Desabilita a caixa de busca
      language: {
        lengthMenu: 'Mostrar <select class="form-select">' +
                    '<option value="10">10</option>' +
                    '<option value="25">25</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">Todos</option>' +
                    '</select> itens na página',
        info: 'Mostrando _START_ a _END_ de _TOTAL_ itens'
      },
      columns: [
        { title: 'UUID' },
        { title: 'Origem Database' },
        { title: 'Recurso' },
        { title: 'HTTP Code' },
        { title: 'Data' } // Adiciona a coluna para data
      ],
      pagingType: 'full_numbers', // Utiliza a paginação completa
      pageLength: 10 // Define o número inicial de itens por página
    });

    // Customiza o filtro por data no DataTables
    $.fn.dataTable.ext.search.push(function (settings, searchData, dataIndex) {
      const searchValue = settings.oPreviousSearch.sSearch; // Obtém o valor de busca em minúsculas
      const rowDate = searchData[4]; // Obtém o valor da data da linha em minúsculas

      // Verifica se a busca é uma data válida
      if (isValidDate(searchValue)) {
        const minDate = new Date(searchValue);
        const row = new Date(rowDate);

        if (row >= minDate) {
          return true;
        }
        return false;
      }

      // Se não for uma data válida, retorna verdadeiro para exibir todas as linhas
      return true;
    });

    // Função para verificar se uma string é uma data válida
    function isValidDate(dateString) {
      const regex = /^\d{4}-\d{2}-\d{2}$/; // Formato YYYY-MM-DD
      return regex.test(dateString);
    }

    return () => {
      $.fn.dataTable.ext.search.pop();
    };
  }, []);

  return (
    <div className="container mt-4">
      <h2>DataTable com Busca por Data em React</h2>
      <div className="row mb-3">
        <div className="col-md-6">
          <label htmlFor="dateInput" className="form-label">Mostrar Itens na Página:</label>
          <input type="date" id="dateInput" className="form-control" />
        </div>
      </div>
      <div className="table-responsive">
        <table ref={tableRef} className="table" style={{ width: '100%', border: 'none' }}>
          <thead>
            <tr>
              <th>UUID</th>
              <th>Origem Database</th>
              <th>Recurso</th>
              <th>HTTP Code</th>
              <th>Data</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>DB1</td>
              <td>Recurso A</td>
              <td>200</td>
              <td>2024-06-25</td>
            </tr>
            <tr>
              <td>2</td>
              <td>DB2</td>
              <td>Recurso B</td>
              <td>404</td>
              <td>2024-06-24</td>
            </tr>
            <tr>
              <td>3</td>
              <td>DB3</td>
              <td>Recurso C</td>
              <td>500</td>
              <td>2024-06-23</td>
            </tr>
            {/* Adicione mais linhas conforme necessário */}
          </tbody>
        </table>
      </div>
    </div>
  );
};

export default DataTableExample;


->Table Hora
import React, { useEffect, useRef } from "react";
import $ from "jquery";
import "bootstrap/dist/css/bootstrap.min.css";
import "datatables.net-bs4/css/dataTables.bootstrap4.min.css";
import "datatables.net-bs4/js/dataTables.bootstrap4.min.js";

const DataTableExample = () => {
  const tableRef = useRef(null);

  useEffect(() => {
    // Inicializa o DataTable
    const table = $(tableRef.current).DataTable({
      searching: false,
      info: false,
      language: {
        lengthMenu:
          'Mostrar <select class="form-select">' +
          '<option value="10">10</option>' +
          '<option value="25">25</option>' +
          '<option value="50">50</option>' +
          '<option value="-1">Todos</option>' +
          "</select> itens na página",
      },
      columns: [
        { title: "UUID" },
        { title: "Origem Database" },
        { title: "Recurso" },
        { title: "HTTP Code" },
        { title: "Tempo" }, // Mudança de 'Data' para 'Tempo'
      ],
      pagingType: "full_numbers", // Utiliza a paginação completa
      pageLength: 10, // Define o número inicial de itens por página
    });

    // Adiciona botões abaixo da tabela para controlar o temp
    return () => {
      // Remove extensão de filtro customizado do DataTables
      $.fn.dataTable.ext.search.pop();
    };
  }, []);
  const handleStart = () => {
    console.log("Start button clicked");
    // Implemente a lógica para iniciar algo relacionado ao tempo
  };

  const handleStop = () => {
    console.log("Stop button clicked");
    // Implemente a lógica para parar algo relacionado ao tempo
  };

  const handleDownload = (columnTitles, data) => {
    const csvData = [columnTitles];

    data.each(function (row) {
      const rowData = [];
      for (let i = 0; i < columnTitles.length; i++) {
        rowData.push(row[i]);
      }
      csvData.push(rowData);
    });

    const csvContent = csvData.map((row) => row.join(";")).join("\n");
    const csvBlob = new Blob([csvContent], { type: "text/csv" });
    const csvUrl = URL.createObjectURL(csvBlob);

    const a = document.createElement("a");
    a.href = csvUrl;
    a.download = "table_data.csv";
    a.click();

    URL.revokeObjectURL(csvUrl);
  };

