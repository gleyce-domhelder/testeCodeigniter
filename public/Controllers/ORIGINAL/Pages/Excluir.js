// Editar.js
import React from 'react';// Assuming AccessButton is a separate component

const Excluir = ({ rota, nome, dado, condicion }) => {
    if (!condicion) {
        return null; // Don't render the button if the condition is false
    }

    return (
        <a href="#" class="btn btn-danger shadow btn-xs sharp">
            <i class="fa fa-trash"></i>
        </a>
    );
};

export default Excluir;