<x-mi-layout>
    <h1>Creación de nueva tarea</h1>

    @include('form-error')

    <form action="{{ route('tarea.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="titulo">Título:</label>
            <input
                class="form-control"
                type="text"
                id="titulo"
                name="titulo"
                value="{{ old('titulo') }}"
                >
            @error('titulo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
        @error('descripcion')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <button type="submit">Guardar</button>
    </form>
</x-mi-layout>