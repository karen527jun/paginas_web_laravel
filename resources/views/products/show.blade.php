@extends('layout.app')
@section('title', 'Productos')
@section('content')
    <hr>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Productos</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <div class="row text-center">
                <div class="col">
                    <h3>Listado de productos</h3>
                </div>
                <div class="col">
                    <button class="btn btn-md btn-dark" id="addForm" path="/products/create" data-bs-toggle="modal"
                        data-bs-target="#myModal">
                        Crear Producto
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Marca</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Camisa</td>
                        <td>12.5</td>
                        <td>Pumas</td>
                        <td>
                            <a class="btn btn-sm btn-success edit" path="/products/edit" data-bs-toggle="modal"
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
