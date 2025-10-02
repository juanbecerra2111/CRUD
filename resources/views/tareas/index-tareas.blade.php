<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tareas</title>
</head>
<body>
    <h1>Listado de Tareas</h1>
    <ul>
        <li>
            <a href="{{ route('tarea.create') }}">Crear nueva tarea</a>
        </li>
    </ul>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tareas as $tarea)
                <tr>
                    <td>{{ $tarea->id }}</td>
                    <td>
                        <a href="{{ route('tarea.show', $tarea->id) }}">
                            {{ $tarea->titulo }}
                        </a>
                    </td>
                    <td>---</td>
                </tr>
            @endforeach
        </tbody>
</body>
</html>