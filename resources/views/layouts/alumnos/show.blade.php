@extends('layouts.app')

@section('content')
<h2>Detalle del Alumno</h2>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Código:</strong> {{ $alumno->codigo }}</li>
    <li class="list-group-item"><strong>Nombre:</strong> {{ $alumno->nombre }}</li>
    <li class="list-group-item"><strong>Correo:</strong> {{ $alumno->correo }}</li>
    <li class="list-group-item"><strong>Fecha Nacimiento:</strong> {{ $alumno->fecha_nacimiento }}</li>
    <li class="list-group-item"><strong>Sexo:</strong> {{ $alumno->sexo }}</li>
    <li class="list-group-item"><strong>Carrera:</strong> {{ $alumno->carrera }}</li>
</ul>

<a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-warning">Editar</a>
<a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Volver</a>
@endsection
