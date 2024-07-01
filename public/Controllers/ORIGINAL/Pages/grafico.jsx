import React, { useState, useEffect } from 'react';
import { Line, Bar } from 'react-chartjs-2';

const ChartPage = () => {
  const [startDate, setStartDate] = useState('');
  const [endDate, setEndDate] = useState('');
  const [httpCode, setHttpCode] = useState('');

  // Dados de exemplo para gráfico de tempo de execução
  const runtimeData = {
    labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
    datasets: [
      {
        label: 'Tempo de Execução',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }
    ]
  };

  // Dados de exemplo para gráfico de código HTTP
  const httpCodeData = {
    labels: ['200', '404', '500'],
    datasets: [
      {
        label: 'Códigos HTTP',
        data: [30, 50, 20],
        backgroundColor: [
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(255, 99, 132, 0.2)'
        ],
        borderColor: [
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(255, 99, 132, 1)'
        ],
        borderWidth: 1
      }
    ]
  };

  // Dados de exemplo para gráfico de linha geral
  const lineChartData = {
    labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
    datasets: [
      {
        label: 'Vendas',
        data: [65, 59, 80, 81, 56, 55],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
      }
    ]
  };

  // Função para simular atualização dos dados com os filtros
  useEffect(() => {
    // Aqui você pode adicionar lógica para buscar dados filtrados do backend
    // com base nos estados startDate, endDate e httpCode
  }, [startDate, endDate, httpCode]);

  // Handlers para mudança nos inputs
  const handleStartDateChange = (e) => {
    setStartDate(e.target.value);
  };

  const handleEndDateChange = (e) => {
    setEndDate(e.target.value);
  };

  const handleHttpCodeChange = (e) => {
    setHttpCode(e.target.value);
  };

  return (
    <div className="container mt-4">
      <h2>Gráficos com Filtros</h2>
      <div className="row mb-3">
        <div className="col-md-3">
          <label htmlFor="startDateInput" className="form-label">Data Início:</label>
          <input type="date" id="startDateInput" className="form-control" value={startDate} onChange={handleStartDateChange} />
        </div>
        <div className="col-md-3">
          <label htmlFor="endDateInput" className="form-label">Data Fim:</label>
          <input type="date" id="endDateInput" className="form-control" value={endDate} onChange={handleEndDateChange} />
        </div>
        <div className="col-md-3">
          <label htmlFor="httpCodeInput" className="form-label">Código HTTP:</label>
          <input type="text" id="httpCodeInput" className="form-control" value={httpCode} onChange={handleHttpCodeChange} />
        </div>
      </div>
      <div className="row">
        <div className="col-md-6">
          <Bar data={runtimeData} />
        </div>
        <div className="col-md-6">
          <Bar data={httpCodeData} />
        </div>
      </div>
      <div className="row mt-4">
        <div className="col">
          <Line data={lineChartData} />
        </div>
      </div>
    </div>
  );
};

export default ChartPage;
