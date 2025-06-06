@extends('layout.app')
@section('title', 'Clients')
@section('content')
    <hr>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Clientes</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <div class="row text-center">
                <div class="col">
                    <h3>Listado de clientes</h3>
                </div>
                <div class="col">
                    <button class="btn btn-md btn-dark" id="addForm" path="/clients/create" data-bs-toggle="modal"
                        data-bs-target="#myModal">
                        Crear Cliente
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Karen</td>
                        <td>25</td>
                        <td>Super cliente</td>
                        <td>
                            <a class="btn btn-sm btn-success edit" path="/clients/edit" data-bs-toggle="modal"
                                data-bs-target="#myModal">
                                Editar
                            </a>
                            <a class="btn btn-sm btn-danger delete" path="/destroy">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
