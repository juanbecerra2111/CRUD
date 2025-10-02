<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tarea: Crear</title>
</head>
<body>
    <h1>Creación de nueva tarea</h1>
    <form action="{{ route('tarea.store') }}" method="POST">
        @csrf
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>
        <br>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>