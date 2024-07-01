// components/LoginPage.js
import React, { useState } from 'react';
import LoginServices from '../Services/LoginServices';
import axios from 'axios';

const LoginPage = () => {
  const [email, setEmail] = useState('');
  const [usuario_rede, setusuario_rede] = useState('');
  const [error, setError] = useState(null);

  const handleSubmit = async (e) => {
    e.preventDefault();
    const formData = new FormData();
    formData.append('email', email);
    formData.append('usuario_rede', usuario_rede);

    try {
      const response = await LoginServices.login(formData);
      console.log(response); // you'll get the response data here
    } catch (error) {
      setError(error.message);
    }
    

  };

  return (
    <div>
      <h1>Login</h1>
      <form onSubmit={handleSubmit}>
        <label>
          email:
          <input type="text" value={email} onChange={(e) => setEmail(e.target.value)} />
        </label>
        <br />
        <label>
          usuario_rede:
          <input type="usuario_rede" value={usuario_rede} onChange={(e) => setusuario_rede(e.target.value)} />
        </label>
        <br />
        <button type="submit">Login</button>
      </form>
      {error && <div style={{ color: 'ed' }}>{error}</div>}
    </div>
  );
};

export default LoginPage;