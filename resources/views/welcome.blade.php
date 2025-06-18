<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>

  <link rel="stylesheet" href="https://unpkg.com/@primer/css@^20/dist/primer.css">
  <link rel="stylesheet" href="{{ asset('css/app-purple.css') }}">
</head>
<body>
  <div class="container" style="max-width:none;width:100vw;height:100vh;margin:0;background:none;border-radius:0;box-shadow:none;padding:0;display:flex;flex-direction:row;align-items:stretch;">
    <div class="sidebar">
      @if(isset($articles))
        <h3 class="color-fg-default mb-3" style="text-align:center;"></h3>
        @if($articles->isEmpty())
          <span class="color-fg-muted">No library in this category</span>
        @else
          <ul style="padding:0; list-style:none;">
            @foreach($articles as $article)
              <li style="margin-bottom:12px;">
                <a href="{{ route('list.show', ['id' => $article->id]) }}" class="btn btn-outline" style="width:100%; text-align:left;">{{ $article->title }}</a>
              </li>
            @endforeach
          </ul>
        @endif
        <form action="{{ route('home') }}" method="get" style="margin-top:24px;">
          <button type="submit" class="btn btn-secondary" style="width:100%;">← Back to categories</button>
        </form>
      @else
        <h3 class="color-fg-default mb-3" style="text-align:center;">Categories</h3>
        @if(empty($categories))
          <span class="color-fg-muted">No categories</span>
        @endif
        @foreach($categories as $category)
          <form action="{{ route('categories.articles', ['id' => $category->id]) }}" method="get">
            <button type="submit" class="btn btn-primary">{{ $category->name }}</button>
          </form>
        @endforeach
      @endif
    </div>

    <div class="main-content">
      <h2>Hello world here</h2>
    </div>
  </div>
</body>
</html>
