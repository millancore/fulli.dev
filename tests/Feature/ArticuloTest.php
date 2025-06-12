<?php

use App\Models\Article;

test('show articles in home', function () {
    Article::factory()->count(3)->create();

    $this->get(route('home'))->assertOk();
});

test('create article', function () {

    $response = $this->post(route('form.store'), [
        'title' => 'Test Article',
        'content' => 'Test Article Content',
        'link' => 'http://example.com',
    ]);

    $response->assertRedirect(route('home'))
        ->assertSee('Artículo creado correctamente.');

    $this->assertDatabaseHas('articles', [
        'title' => 'Test Article',
    ]);

});

/*
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
*/
