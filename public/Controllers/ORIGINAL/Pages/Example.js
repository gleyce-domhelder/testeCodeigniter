import React, { useState, useEffect } from 'react';
import Editar from './Editar'
import Excluir from './Excluir'
import Cadastro from './Cadastro'
import UserService from '../Services/FectUsers';
import AcessButton from '../Components/AcessButton'
const UserTable = () => {
    const { users, loading, error } = UserService();

    if (loading) {
        return <div>Carregando...</div>;
    }

    if (error) {
        return <div>Erro: {error.message}</div>;
    }
    return (
        <div id="main-wrapper">
            <div class="content-body">
                <div class="container-fluid">

                    <div class="element-area">
                        <div class="demo-view">
                            <div class="container-fluid pt-0 ps-0 pe-lg-4 pe-0">
                                <div class="row">
                                    <Cadastro tipo={'Usuários'} href={'/login'} condicion={AcessButton({ route: '/login' })} />
                                    <div class="col-xl-12">
                                        <div class="card dz-card" id="accordion-four">
                                            <div class="card-header flex-wrap d-flex justify-content-between">
                                                <div>
                                                    <h4 class="card-title">Fees Collection</h4>
                                                    <p class="m-0 subtitle">Add <code>fees</code> class with <code>datatables</code></p>
                                                </div>
                                            </div>
                                            <div class="tab-content" id="myTabContent-3">
                                                <div class="tab-pane fade show active" id="withoutBorder" role="tabpanel" aria-labelledby="home-tab-3">
                                                    <div class="card-body pt-0">
                                                        <div class="table-responsive">                                                                                                                       <table id="example4" class="display table">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <div className="custom-control d-inline custom-checkbox">
                                                                            <input type="checkbox" className="form-check-input" id="checkAll" required="" />
                                                                            <label className="form-check-label" htmlFor="checkAll"></label>
                                                                        </div>
                                                                    </th>
                                                                    <th>Roll No</th>
                                                                    <th>Student Name</th>
                                                                    <th>Invoice number</th>
                                                                    <th>Fees Type </th>
                                                                    <th>Payment Type </th>
                                                                    <th>Status </th>
                                                                    <th>Date</th>
                                                                    <th>Amount</th>
                                                                </tr>
                                                            </thead>


                                                            <tbody>
                                                                {users.map(user => (
                                                                    <tr key={user.ID}>
                                                                        <td>
                                                                            <div className="form-check custom-checkbox ms-2">
                                                                                <input type="checkbox" className="form-check-input" id={`customCheckBox${user.id}`} required="" />
                                                                                <label className="form-check-label" htmlFor={`customCheckBox${user.id}`}></label>
                                                                            </div>
                                                                        </td>
                                                                        <td>{user.ID}</td>
                                                                        <td>{user.NOME}</td>
                                                                        <td>{user.EMAIL}</td>
                                                                        <td>{user.EMAIL}</td>
                                                                        <td>{user.EMAIL}</td>
                                                                        <td>
                                                                            <span className="badge light badge-danger">
                                                                                <i className="fa fa-circle text-danger me-1"></i>
                                                                                {user.STATUS}
                                                                            </span>
                                                                        </td>
                                                                        <td>{user.EMAIL}</td>
                                                                        <td>
                                                                            <div className="dropdown ms-auto text-end">
                                                                                <div class="d-flex">
                                                                                    <Editar rota={'/usuario/editar/' + 1} nome={'usuarios'} dado={users} condicion={AcessButton({ route: '/login' })} />
                                                                                    <Excluir rota={'/usuario/excluir/' + 1} nome={'usuarios'} dado={users} condicion={AcessButton({ route: '/login' })} />
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                ))}
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default UserTable;
