<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container" style="max-width:none;width:100vw;height:100vh;margin:0;background:none;border-radius:0;box-shadow:none;padding:0;display:flex;flex-direction:row;align-items:stretch;">
    <div class="sidebar d-flex flex-column justify-content-between p-3 bg-light" style="min-width:220px;">
      <div>
        @if(isset($articles))
          <h3 class="text-center mb-3"></h3>
          @if($articles->isEmpty())
            <span class="text-muted">No library in this category</span>
          @else
            <ul class="list-unstyled">
              @foreach($articles as $article)
                <li class="mb-2">
                  <a href="{{ route('list.show', ['id' => $article->id]) }}" class="btn btn-outline-secondary w-100 text-start">{{ $article->title }}</a>
                </li>
              @endforeach
            </ul>
          @endif
          <form action="{{ route('home') }}" method="get" class="mt-4">
            <button type="submit" class="btn btn-secondary w-100">← Back to categories</button>
          </form>
        @else
          <h3 class="text-center mb-3">Categories</h3>
          @if(empty($categories))
            <span class="text-muted">No categories</span>
          @endif
          @foreach($categories as $category)
            <form action="{{ route('categories.articles', ['id' => $category->id]) }}" method="get" class="mb-2">
              <button type="submit" class="btn btn-primary w-100">{{ $category->name }}</button>
            </form>
          @endforeach
        @endif
      </div>
      @if(session('admin_id'))
      <div class="mt-4">
        <a href="{{ route('articles.list') }}" class="btn btn-info w-100 mb-2">List</a>
        <a href="{{ route('form.create') }}" class="btn btn-success w-100 mb-2">Create</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-danger w-100">Logout</button>
        </form>
      </div>
      @endif
    </div>
    <div class="main-content flex-grow-1 p-4">
      <h2>Hello world here</h2>
    </div>
  </div>
</body>
</html>
