import React from "react";
import axios from 'axios';
import { useNavigate } from 'react-router';

export default function LoginForm() {
  const navigate = useNavigate();

  const handleSubmit = (event) => {
    event.preventDefault();
    
    const formData = new FormData(event.target);
    const email = formData.get('email');
    const password = formData.get('password');

    axios.post('http://localhost:8000/api/login',formData)
      .then(function (response) {
        console.log('Enviado com sucesso');
        navigate("/menu");
      })
      .catch(function (error) {
        console.error('Erro ao enviar dados:', error);
      });
  };

  return (
    <div>
      <h2>Login</h2>
      <form onSubmit={handleSubmit}>
        <div>
          <label htmlFor="email">Email:</label>
          <input type="text" id="email" name="email" />
        </div>
        <div>
          <label htmlFor="password">Senha:</label>
          <input type="password" id="password" name="password" />
        </div>
        <button type="submit">Entrar</button>
      </form>
    </div>
  );
}
