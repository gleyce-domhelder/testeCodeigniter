import React, { useEffect, useState } from 'react';

function Menu() {
    const [menuHtml, setMenuHtml] = useState('');

    useEffect(() => {
        fetch('http://localhost:8080/api/login')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao obter a estrutura do menu');
                }
                return response.json();
            })
            .then(data => {
                // Extrai o HTML do menu do JSON retornado
                const { menu } = data;
                setMenuHtml(menu);
            })
            .catch(error => {
                console.error('Erro ao obter dados do PHP:', error);
            });
    }, []);

    return (
        <div>
            {/* Renderiza o HTML do menu */}
            <div dangerouslySetInnerHTML={{ __html: menuHtml }} />
        </div>
    );
}

export default Menu;
