import React, { useState, useEffect } from "react";
import { MultiSelect } from "react-multi-select-component";
import axios from 'axios';

const UserForm = () => {
  const [options, setOptions] = useState([]);
  const [selected, setSelected] = useState([]);

  useEffect(() => {
    // Faz a requisição para obter as opções
    axios.get('http://localhost:8080/api/usuarios')
      .then(response => {
        // Se o request for bem sucedido, atualiza o estado das opções
        setOptions(response.data);
      })
      .catch(error => {
        // Se houver um erro, você pode tratá-lo aqui
        console.error('Erro ao buscar opções:', error);
      });
  }, []); // O array vazio como segundo argumento garante que o useEffect só seja chamado uma vez, similar ao componentDidMount

  return (
    <div>
      <h1>Select Fruits</h1>
      <pre>{JSON.stringify(selected)}</pre>
      <MultiSelect
        options={options}
        value={selected}
        onChange={setSelected}
        labelledBy="Select"
      />
    </div>
  );
};

export default UserForm;
