<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Articles</title>
    <link rel="stylesheet" href="https://unpkg.com/@primer/css@^20/dist/primer.css">
    <link rel="stylesheet" href="{{ asset('css/app-purple.css') }}">
</head>
<body>
<div class="container" style="max-width:none;width:100vw;height:100vh;margin:0;background:none;border-radius:0;box-shadow:none;padding:0;display:flex;flex-direction:row;align-items:stretch;">
        <h1>All Library</h1>
        <ul class="article-list">
            @forelse($articles as $article)
                <li>
                    <div class="article-title">{{ $article->title }}</div>
                    <div class="article-content">{{ \Illuminate\Support\Str::limit($article->content, 120) }}</div>
                    <a href="{{ route('articles.edit', $article->id) }}" class="article-link">Edit</a>
                </li>
            @empty
                <li>No Library found.</li>
            @endforelse
        </ul>
    </div>
</body>
</html>
