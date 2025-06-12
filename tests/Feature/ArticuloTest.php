<?php
use App\Models\Articulo;

test('create articles', function () {
    $articulos = Articulo::factory()->count(10)->create();
    expect($articulos)->toHaveCount(10);
    expect(Articulo::count())->toBe(10);
});

test('show article detail', function () {
    $articulo = Articulo::factory()->create();
    $response = $this->get(route('list.show', ['id' => $articulo->id]));
    $response->assertStatus(200);
    $response->assertSee($articulo->titulo);
    $response->assertSee($articulo->contenido);
    $response->assertSee($articulo->link);
});

test('sidebar shows article titles on welcome', function () {
    $articulos = Articulo::factory()->count(3)->create();
    $response = $this->get('/');
    foreach ($articulos as $articulo) {
        $response->assertSee($articulo->titulo);
    }
});