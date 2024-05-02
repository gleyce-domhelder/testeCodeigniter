import { BrowserRouter, Route, Routes } from 'react-router-dom';
import Login from './login';
import Menu from './menu';
export default function RoutesCreate(){
    return (
        <BrowserRouter>
        <Routes>
          <Route path="/" element={<Login />} />
          <Route path="/menu" element={<Menu />} />
        </Routes>
      </BrowserRouter>
    );
  }
