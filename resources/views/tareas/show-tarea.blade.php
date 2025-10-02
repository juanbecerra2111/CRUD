<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        <li>
            <a href="{{ route('tarea.index') }}">Tareas</a>
        </li>
    </ul>
    <h1>Tarea: {{ $tarea->titulo }}</h1>

    <p>
        <strong>Descripción:</strong><br>
        {{ $tarea->descripcion }}
    </p>
</body>
</html>