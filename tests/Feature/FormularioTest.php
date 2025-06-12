<?php
use function Pest\Laravel\get;
use function Pest\Laravel\post;

it('muestra el formulario de creación', function () {
    $response = get(route('form.create'));
    $response->assertStatus(200);
    $response->assertSee('Crear nuevo artículo');
    $response->assertSee('Título:');
    $response->assertSee('Contenido:');
    $response->assertSee('Link:');
});
