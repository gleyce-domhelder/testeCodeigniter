// services/UserService.js
import { useState, useEffect } from 'react';

const UserService = () => {
  const [users, setUsers] = useState([]);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchUsers = async () => {
      try {
        setLoading(true);
        const response = await fetch('http://localhost:8000/api/usuarios');
        if (!response.ok) {
          throw new Error('Falha ao carregar os dados dos usuários');
        }
        const data = await response.json();
        setUsers(data);
        localStorage.setItem('users', JSON.stringify(data));
      } catch (error) {
        setError(error);
        console.error('Erro ao buscar usuários:', error);
      } finally {
        setLoading(false);
      }
    };

    if (!localStorage.getItem('users')) {
      fetchUsers();
    } else {
      const storedUsers = localStorage.getItem('users');
      setUsers(JSON.parse(storedUsers));
    }
  }, []);

  return { users, loading, error };
};

export default UserService;