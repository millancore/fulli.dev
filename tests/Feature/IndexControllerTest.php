<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Article;

uses(RefreshDatabase::class);

describe('IndexController', function () {
    test('index loads all articles', function () {
        Article::factory()->count(2)->create();
        $response = $this->get('/');
        $response->assertOk();
        $response->assertViewIs('welcome');
    });
});
