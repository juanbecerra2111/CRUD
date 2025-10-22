<?php
// tests/Feature/Controllers/AlumnoControllerTest.php

use App\Models\Alumno;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('se listan alumnos', function () {
    $alumnos = Alumno::factory()->count(2)->create();

    $this->get(route('alumnos.index'))
        ->assertStatus(200)
        ->assertSee($alumnos[0]->nombre)
        ->assertSee($alumnos[1]->nombre);
});

test('se muestra formulario de creación de alumno', function () {
    $this->get(route('alumnos.create'))
        ->assertStatus(200)
        ->assertSee('Registrar Nuevo Alumno')
        ->assertSee('Código')
        ->assertSee('Nombre')
        ->assertSee('Correo');
});

test('se puede crear un alumno', function () {
    $alumno = Alumno::factory()->make();

    $this->post(route('alumnos.store'), $alumno->toArray())
        ->assertRedirect(route('alumnos.index'));

    $this->assertDatabaseHas('alumnos', [
        'codigo' => $alumno->codigo,
        'nombre' => $alumno->nombre,
        'correo' => $alumno->correo
    ]);
});

test('se muestra formulario de edición de alumno', function () {
    $alumno = Alumno::factory()->create();

    $this->get(route('alumnos.edit', $alumno))
        ->assertStatus(200)
        ->assertSee('Editar Alumno')
        ->assertSee($alumno->nombre);
});

test('se puede editar un alumno', function () {
    $alumno = Alumno::factory()->create();
    $datosActualizados = Alumno::factory()->make();

    $this->put(route('alumnos.update', $alumno), $datosActualizados->toArray())
        ->assertRedirect(route('alumnos.show', $alumno));

    $this->assertDatabaseHas('alumnos', [
        'id' => $alumno->id,
        'nombre' => $datosActualizados->nombre,
        'correo' => $datosActualizados->correo
    ]);
});

test('se muestra detalle de alumno', function () {
    $alumno = Alumno::factory()->create();

    $this->get(route('alumnos.show', $alumno))
        ->assertStatus(200)
        ->assertSee($alumno->codigo)
        ->assertSee($alumno->nombre)
        ->assertSee($alumno->correo);
});

test('se puede eliminar un alumno', function () {
    $alumno = Alumno::factory()->create();

    $this->delete(route('alumnos.destroy', $alumno))
        ->assertRedirect(route('alumnos.index'));

    $this->assertDatabaseMissing('alumnos', [
        'id' => $alumno->id
    ]);
});

test('validación de formulario al crear alumno', function () {
    $this->post(route('alumnos.store'), [])
        ->assertSessionHasErrors(['codigo', 'nombre', 'correo', 'fecha_nacimiento', 'sexo', 'carrera']);
});

test('validación de correo único al crear alumno', function () {
    $alumno = Alumno::factory()->create();

    $this->post(route('alumnos.store'), [
        'codigo' => 'A123456',
        'nombre' => 'Juan Pérez',
        'correo' => $alumno->correo,
        'fecha_nacimiento' => '2000-01-01',
        'sexo' => 'M',
        'carrera' => 'Ingeniería'
    ])->assertSessionHasErrors('correo');
});