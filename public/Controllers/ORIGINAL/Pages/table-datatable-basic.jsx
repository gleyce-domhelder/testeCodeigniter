import React, { useEffect, useRef } from 'react';
import $ from 'jquery';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'datatables.net-bs4/css/dataTables.bootstrap4.min.css';
import 'datatables.net-bs4/js/dataTables.bootstrap4.min.js';

const DataTableExample = () => {
  const tableRef = useRef(null);

  useEffect(() => {
    // Inicializa o DataTable
    const table = $(tableRef.current).DataTable({
      searching: false, // Desabilita a caixa de busca
      language: {
        lengthMenu: 'Mostrar <select class="form-select">' +
                    '<option value="10">10</option>' +
                    '<option value="25">25</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">Todos</option>' +
                    '</select> itens na página',
        info: 'Mostrando _START_ a _END_ de _TOTAL_ itens'
      },
      columns: [
        { title: 'UUID' },
        { title: 'Origem Database' },
        { title: 'Recurso' },
        { title: 'HTTP Code' },
        { title: 'Data' } // Adiciona a coluna para data
      ],
      pagingType: 'full_numbers', // Utiliza a paginação completa
      pageLength: 10 // Define o número inicial de itens por página
    });

    // Customiza o filtro por data no DataTables
    $.fn.dataTable.ext.search.push(function (settings, searchData, dataIndex) {
      const searchValue = settings.oPreviousSearch.sSearch; // Obtém o valor de busca em minúsculas
      const rowDate = searchData[4]; // Obtém o valor da data da linha em minúsculas

      // Verifica se a busca é uma data válida
      if (isValidDate(searchValue)) {
        const minDate = new Date(searchValue);
        const row = new Date(rowDate);

        if (row >= minDate) {
          return true;
        }
        return false;
      }

      // Se não for uma data válida, retorna verdadeiro para exibir todas as linhas
      return true;
    });

    // Função para verificar se uma string é uma data válida
    function isValidDate(dateString) {
      const regex = /^\d{4}-\d{2}-\d{2}$/; // Formato YYYY-MM-DD
      return regex.test(dateString);
    }

    return () => {
      $.fn.dataTable.ext.search.pop();
    };
  }, []);

  return (
    <div className="container mt-4">
      <h2>DataTable com Busca por Data em React</h2>
      <div className="row mb-3">
        <div className="col-md-6">
          <label htmlFor="dateInput" className="form-label">Mostrar Itens na Página:</label>
          <input type="date" id="dateInput" className="form-control" />
        </div>
      </div>
      <div className="table-responsive">
        <table ref={tableRef} className="table" style={{ width: '100%', border: 'none' }}>
          <thead>
            <tr>
              <th>UUID</th>
              <th>Origem Database</th>
              <th>Recurso</th>
              <th>HTTP Code</th>
              <th>Data</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>DB1</td>
              <td>Recurso A</td>
              <td>200</td>
              <td>2024-06-25</td>
            </tr>
            <tr>
              <td>2</td>
              <td>DB2</td>
              <td>Recurso B</td>
              <td>404</td>
              <td>2024-06-24</td>
            </tr>
            <tr>
              <td>3</td>
              <td>DB3</td>
              <td>Recurso C</td>
              <td>500</td>
              <td>2024-06-23</td>
            </tr>
            {/* Adicione mais linhas conforme necessário */}
          </tbody>
        </table>
      </div>
    </div>
  );
};

export default DataTableExample;
