// Pagination.js

import React from 'react';

const Pagination = ({ currentPage, totalPages, onChangePage }) => {
  const pageNumbers = [];

  for (let i = 1; i <= totalPages; i++) {
    pageNumbers.push(i);
  }

  return (
    <nav>
      <ul className="pagination pagination-circle">
        <li className="page-item page-indicator">
          <button
            className="page-link"
            onClick={() => onChangePage(currentPage - 1)}
            disabled={currentPage === 1}
          >
            <i className="la la-angle-left"></i>
          </button>
        </li>
        {pageNumbers.map((number) => (
          <li
            key={number}
            className={`page-item ${number === currentPage ? 'active' : ''}`}
          >
            <button className="page-link" onClick={() => onChangePage(number)}>
              {number}
            </button>
          </li>
        ))}
        <li className="page-item page-indicator">
          <button
            className="page-link"
            onClick={() => onChangePage(currentPage + 1)}
            disabled={currentPage === totalPages}
          >
            <i className="la la-angle-right"></i>
          </button>
        </li>
      </ul>
    </nav>
  );
};

export default Pagination;
