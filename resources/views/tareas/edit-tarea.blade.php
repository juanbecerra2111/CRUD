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
    @include('form-error')
    <form action="{{ route('tarea.update', $tarea->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo') ?? $tarea->titulo }}">
        <br>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion">{{ old('descripcion') ?? $tarea->descripcion }}</textarea>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>