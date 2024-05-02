import React, { useEffect, useState } from 'react';

function Menu() {
    const [menuHtml, setMenuHtml] = useState('');

    useEffect(() => {
        fetch('http://localhost:8000/api/login')
            .then(res => res.json()) 
            .then(data => {
              if(data.menuHtml)
                setMenuHtml(data.menuHtml);
              else 
              console.error('Erro ao obter a estrutura'); 
            })
            .catch(error => {
                console.error('Erro ao obter dados do PHP:', error);
            });
    }, []);

    return (
        <div>
            <h1>Menu</h1>
            <div dangerouslySetInnerHTML={{ __html: menuHtml }}></div> 
        </div>
    );
}

export default Menu;
