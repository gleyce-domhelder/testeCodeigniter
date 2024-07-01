import React, { useState, useEffect } from "react";
import axios from "axios";
function UserList() {
  const [users, setUsers] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      const response = await fetch("http://localhost:8080/api/usuarios");
      const data = await response.json();
      console.log(data);
      setUsers(data);
    };

    fetchData();
  }, []);

  const handleDelete = (userId) => {
    console.log(userId);
    // Lógica para excluir o usuário com o ID userId
    axios.post('http://localhost:8080/api/deletar')
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });



  const handleEdit = (userId) => {
    // Lógica para excluir o usuário com o ID userId
    console.log("Excluir usuário com ID", userId);
  };

  return (

    <div>
         <h1>Lista de Usuários</h1>
         <button><a href='/cadastrar'>Cadastrar usuario</a></button>
       <ul>
        {users.map((user) => (
          <li key={user.id}>
            {user.Nome} - {user.email}
            <button onClick={() => handleEdit(user.id)}>Editar</button>
            <button onClick={() => handleDelete(user.id)}>Excluir</button>
          </li>
        ))}
      </ul>
    </div>
     
    
  );
}
}

export default UserList;
