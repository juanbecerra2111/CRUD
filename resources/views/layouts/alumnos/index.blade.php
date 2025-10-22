@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Lista de Alumnos</h2>
    <a href="{{ route('alumnos.create') }}" class="btn btn-primary">+ Nuevo Alumno</a>
</div>
<h1>Vista de alumnos funcionando</h1>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Carrera</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($alumnos as $alumno)
        <tr>
            <td>{{ $alumno->id }}</td>
            <td>{{ $alumno->codigo }}</td>
            <td>{{ $alumno->nombre }}</td>
            <td>{{ $alumno->correo }}</td>
            <td>{{ $alumno->carrera }}</td>
            <td>
                <a href="{{ route('alumnos.show', $alumno) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este alumno?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">No hay alumnos registrados.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
