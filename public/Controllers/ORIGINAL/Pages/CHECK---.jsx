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
