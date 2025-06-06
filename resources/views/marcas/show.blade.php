@extends('layout.app')
@section('title', 'Marcas')
@section('content')
    <hr>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Marcas</li>
        </ol>
    </nav>
    <hr>
    <div class="card">
        <div class="card-header">
            <div class="row text-center">
                <div class="col">
                    <h3>Listado de Marcas</h3>
                </div>
                <div class="col">
                    <button class="btn btn-md btn-dark" id="addForm" path="/marca/create" data-bs-toggle="modal"
                        data-bs-target="#myModal">
                        Crear Marca
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Pumas</td>
                        <td>
                            <a class="btn btn-sm btn-success edit" path="/marca/edit" data-bs-toggle="modal"
                                data-bs-target="#myModal">
                                Editar
                            </a>
                            <a class="btn btn-sm btn-danger delete" path="/marca/destroy">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
