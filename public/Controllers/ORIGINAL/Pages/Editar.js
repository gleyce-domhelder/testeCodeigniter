// Editar.js
import React from 'react';
const Editar = ({ rota, nome, dado, condicion }) => {
    if (!condicion) {
        return null; // Don't render the button if the condition is false
    }

    return (
        <a href="#" class="btn btn-primary shadow btn-xs sharp me-1">
            <i class="fas fa-pencil-alt"></i>
        </a>
    );
};

export default Editar;