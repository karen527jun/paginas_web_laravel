@extends('layouts.app')
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
            <table class="table table-hover table-bordered" id="datatables">
                <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var ruta = "/clients/show";
        var columnas = [
            {
                data: 'codigo'
            },
            {
                data: 'nombre'
            },
            {
                data: 'edad'
            },
            {
                data: 'categoria'
            },
            {
                data: 'codigo'
            }
        ]
        dt = generateDataTable(ruta, columnas);
    });
</script>
@endsection
