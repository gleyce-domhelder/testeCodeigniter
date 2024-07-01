import React from 'react';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Login from '../Pages/login';
import Menu from '../Components/menu';
import Inicial from '../Components/paginaInicial';
import Logout from '../Components/logout';
import User from '../Pages/UserList';
import Cadastrar from '../Pages/UserForm';
import Table from '../Pages/table-datatable-basic';
import Hora from '../Pages/table-hora';
import Cadastro from '../Pages/Cadastro';
import Grafico from '../Pages/grafico';
import Pagination from '../Pages/Inicial';
import Example from '../Pages/Example';

const routes = [
  { path: '/login', element: <Login />, key: 1 },
  { path: '/example', element: <Example />, key: 2 },
  { path: '/cadastro', element: <Cadastro />, key: 3 },
  { path: '/table', element: <Table />, key: 4 },
  { path: '/hora', element: <Hora />, key: 5 },
  { path: '/menu', element: <Menu />, key: 6 },
  { path: '/', element: <Inicial />, key: 7 },
  { path: '/grafico', element: <Grafico />, key: 8 },
  { path: '/listar', element: <User />, key: 9 },
  { path: '/logout', element: <Logout />, key: 10 },
  { path: '/pages', element: <Pagination />, key: 12 },
];

const RoutesComponent = () => {
  return (
    <BrowserRouter>
      <Routes>
        {routes.map(route => (
          <Route key={route.key} path={route.path} element={route.element} />
        ))}
      </Routes>
    </BrowserRouter>
  );
};

export default RoutesComponent;
