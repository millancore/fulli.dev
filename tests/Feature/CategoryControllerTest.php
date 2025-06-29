<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;

uses(RefreshDatabase::class);

test('categories index loads', function () {
    Category::factory()->count(2)->create();
    $response = $this->get(route('home'));
    $response->assertOk();
    $response->assertViewIs('welcome');
});

test('showArticles loads articles for category', function () {
    $category = Category::factory()->create();
    $response = $this->get(route('categories.articles', $category->id));
    $response->assertOk();
    $response->assertViewIs('welcome');
});
