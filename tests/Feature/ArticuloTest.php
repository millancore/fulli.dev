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

    $article = Article::latest()->first();

    $response->assertRedirect(route('list.show', $article));

    $this->assertDatabaseHas('articles', [
        'title' => 'Test Article',
    ]);
});

test('article detail view shows all content', function () {
    $article = Article::factory()->create([
        'title' => 'Test Article',
        'content' => 'Test Article Content',
        'link' => 'http://example.com',
    ]);

    $response = $this->get(route('list.show', $article));

    $response->assertSee('Test Article');
    $response->assertSee('Test Article Content');
    $response->assertSee('http://example.com');
});

