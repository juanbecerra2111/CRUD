<?php

use App\Models\Tarea;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('muestra listado de tareas', function () {
    $tarea = Tarea::factory()->create();

    $this->get(route('tarea.index'))
        ->assertSeeInOrder(['Título', 'Acciones'])
        ->assertSee($tarea->titulo)
        ->assertStatus(200);
});

test('muestra formulario de creación de tarea', function () {
    $this->get(route('tarea.create'))
        ->assertSeeInOrder(['Título', 'Descripción', 'Guardar'])
        ->assertStatus(200);
});

test('crea una tarea', function () {
    $tarea = Tarea::factory()->make();

    $this->post(route('tarea.store'), $tarea->toArray())
        ->assertRedirect(route('tarea.index'));

    $this->assertDatabaseHas('tareas', [
        'titulo' => $tarea->titulo,
        'descripcion' => $tarea->descripcion
    ]);

    $this->get(route('tarea.index'))
        ->assertSee($tarea->titulo);
});

test('verifica errores al crear tarea', function () {
    $tarea = Tarea::factory()->make([
        'titulo' => '',
        'descripcion' => 'Corta'
    ]);

    $this->post(route('tarea.store'), $tarea->toArray())
        ->assertInvalid(['titulo', 'descripcion']);

    $this->assertDatabaseMissing('tareas', [
        'titulo' => $tarea->titulo,
        'descripcion' => $tarea->descripcion
    ]);

    // $this->get(route('tarea.index'))
    //     ->assertSee($tarea->titulo);
});
