import React from 'react';

const Cadastro = ({ tipo, href, condicion }) => {
  if (!condicion) {
    return null; // Don't render the button if the condition is false
  }

  return (
    <button>
      <a href={href}>{`Cadastrar ${tipo}`}</a>
    </button>
  );
};

export default Cadastro;