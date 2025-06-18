<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Library</title>
    <link rel="stylesheet" href="https://unpkg.com/@primer/css@^20/dist/primer.css">
    <link rel="stylesheet" href="{{ asset('css/app-purple.css') }}">
</head>
<body>
<div class="container" style="max-width:none;width:100vw;height:100vh;margin:0;background:none;border-radius:0;box-shadow:none;padding:0;display:flex;flex-direction:row;align-items:stretch;">
        <form action="{{ route('articles.update', $article->id) }}" method="POST">
            <div class="header">
                @csrf
                @method('PUT')
                <button type="submit" class="save-btn">Save</button>
            </div>
            <h1>Edit Article</h1>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title', $article->title) }}" required>
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content" rows="6" required>{{ old('content', $article->content) }}</textarea>
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="link">Link:</label>
                <input type="url" id="link" name="link" value="{{ old('link', $article->link) }}" required>
                @error('link')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </form>
    </div>
</body>
</html>
