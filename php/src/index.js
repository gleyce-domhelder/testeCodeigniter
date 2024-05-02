import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import axios from 'axios';
import RoutesCreate from './Components/routes';

import './assets/css/style.css';

axios.defaults.withCredentials = true;

const root = ReactDOM.createRoot(document.getElementById('root'));

root.render(
  <React.StrictMode>
    <RoutesCreate />
  </React.StrictMode>
);
