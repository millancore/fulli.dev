<?php

describe('ArticleController', function () {
    it('index shows all articles', function () {
        \App\Models\Article::factory()->count(2)->create();
        $response = $this->get(route('articles.list'));
        $response->assertOk();
        $response->assertViewIs('list.all');
    });

    it('edit loads article and categories', function () {
        $article = \App\Models\Article::factory()->create();
        $response = $this->get(route('articles.edit', $article->id));
        $response->assertOk();
        $response->assertViewIs('list.edit');
    });

    it('update modifies article', function () {
        $article = \App\Models\Article::factory()->create();
        $category = \App\Models\Category::factory()->create();
        $response = $this->put(route('articles.update', $article->id), [
            'title' => 'Updated',
            'content' => 'Updated Content',
            'link' => 'http://example.com',
            'category_id' => $category->id,
        ]);
        $response->assertRedirect(route('articles.list'));
        $this->assertDatabaseHas('articles', [
            'title' => 'Updated',
        ]);
    });
});
