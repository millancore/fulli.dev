<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Article;

uses(RefreshDatabase::class);

test('show loads article', function () {
    $article = Article::factory()->create();
    $response = $this->get(route('list.show', $article->id));
    $response->assertOk();
    $response->assertViewIs('list.show');
    $response->assertSee($article->title);
});
