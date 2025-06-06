
    @extends('layout.app')
    @section('title', 'Inicio')
    @section('content')

        <h1>Pantalla de inicio</h1>
        {{ $nombre . ' ' . $apellido }}
    @endsection

