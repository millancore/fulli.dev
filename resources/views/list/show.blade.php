<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library View</title>

  <link rel="stylesheet" href="https://unpkg.com/@primer/css@^20/dist/primer.css">
  <link rel="stylesheet" href="{{ asset('css/app-purple.css') }}">
</head>
<body>
<div class="container" style="max-width:none;width:100vw;height:100vh;margin:0;background:none;border-radius:0;box-shadow:none;padding:0;display:flex;flex-direction:row;align-items:stretch;">
    <div class="sidebar">
        <div class="sidebar-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <span class="sidebar-title" style="margin: 0;">Links</span>
            <a href="/" class="btn btn-outline sidebar-back" style="margin: 0;">← Back</a>
        </div>
      <div class="sidebar-list">
        @if(isset($article) && $article->link)
          <a href="{{ $article->link }}" target="_blank">{{ $article->link }}</a>
        @else
          <span class="color-fg-muted">No links</span>
        @endif
      </div>
    </div>

    <div class="main-content">
      <div>
        <h1>{{ $article->title ?? 'No title' }}</h1>
        <div>{{ $article->content ?? '' }}</div>
      </div>
    </div>
  </div>
</body>
</html>
