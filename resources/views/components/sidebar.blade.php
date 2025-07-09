<div class="h-100 d-flex flex-column justify-content-between">
  <div>
    @if(isset($articles))
      <h3 class="text-center mb-3"></h3>
      @if($articles->isEmpty())
        <span class="text-muted">No library in this category</span>
      @else
        <ul class="list-unstyled">
          @foreach($articles as $article)
            <li class="mb-2">
              <a href="{{ route('list.show', ['id' => $article->id]) }}" class="btn w-100 text-start" style="background-color: #ede7f6; color: #5a189a; border: none;">{{ $article->title }}</a>
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
          <button type="submit" class="btn w-100" style="background-color: #6f42c1; color: #fff;">{{ $category->name }}</button>
        </form>
      @endforeach
    @endif
  </div>
  @auth
  <div class="pt-4 d-flex flex-column align-items-start" style="gap: 0.5rem;">
    <a href="{{ route('articles.list') }}" class="btn w-100 mb-2" style="background-color: #5a189a; color: #fff;">List</a>
    <a href="{{ route('form.create') }}" class="btn w-100 mb-2" style="background-color: #9d4edd; color: #fff;">Create</a>
    <form method="POST" action="{{ route('logout') }}" class="w-100">
      @csrf
      <button type="submit" class="btn w-100" style="background-color: #b5179e; color: #fff;">Logout</button>
    </form>
  </div>
  @endauth
</div>
