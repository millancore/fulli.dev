<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use App\Models\Article;

uses(RefreshDatabase::class);

describe('FormularioController', function () {
    test('create form loads', function () {
        $response = $this->get(route('form.create'));
        $response->assertOk();
        $response->assertViewIs('formulario.create');
    });

    test('store creates article', function () {
        $category = Category::factory()->create();
        $response = $this->post(route('form.store'), [
            'title' => 'Test Article',
            'content' => 'Test Content',
            'link' => 'http://example.com',
            'category_id' => $category->id,
        ]);
        $response->assertRedirect();
        $this->assertDatabaseHas('articles', [
            'title' => 'Test Article',
        ]);
    });
});
