<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tarea: Editar</title>
</head>
<body>
    <h1>Editar tarea</h1>
    <form action="{{ route('tarea.update', $tarea->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="{{ $tarea->titulo }}" required>
        <br>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required>{{ $tarea->descripcion }}</textarea>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>