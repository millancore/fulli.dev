<div class="min-vh-100 py-5 border-top" style="background-color: #ede9fe;border-top: 1px solid red;">
  <div class="d-sm-none d-md-block">
  <div class="container min-vh-100 " style="background-color: #ede9fe; border-right: 1px solid #d0bfff;">
    <div class="row justify-content-center">
      <div class="col-lg-8">

        @isset($category)
          <h3 class="text-dark mb-4 ">{{ $category->name }}</h3>

          <a href="{{ route('index') }}" class="mb-4 d-block text-decoration-none text-primary">
            ← Back
          </a>

          @if ($category->articles->isEmpty())
            <p class="text-muted ">No articles</p>
          @else 
            <div class="d-flex flex-column gap-2">
                <div class="d-flex flex-column gap-3">
                  @foreach ($category->articles as $article)
                    <div class="row align-items-center">

                      <div class="col-8">
                        <a href="{{ route('article.show', [$article->id]) }}"
                          class="text-dark text-decoration-none fw-medium">
                          {{ $article->title }}
                        </a>
                      </div>

                      @if(Auth::check())
                        <div class="col-4 text-end">
                          <a href="{{ route('articles.edit', $article->id) }}"
                            class="btn btn-sm btn-outline-primary">
                            Editar
                          </a>
                        </div>
                      @endif
                    </div>
                  @endforeach
                </div>


            </div>
          @endif

      @elseif(isset($categories))
        <h3 class="text-dark mb-4 ">Categories</h3>

        @if ($categories->isEmpty())
          <p class="text-muted text-center">No categories</p>
        @else
          <div class="d-flex flex-column gap-1 ps-3">
                <div class="d-flex flex-column gap-3">
                  @foreach ($categories as $category)
                    <div class="row align-items-center">

                      <div class="col-8">
                        <a href="{{ route('categories.show', [$category->id]) }}"
                          class="text-dark text-decoration-none fw-medium">
                          {{ $category->name }}
                        </a>
                      </div>
                      @if(Auth::check())
                        <div class="col-4 text-end">
                          <form action="{{ route('categories.destroy', $category->id) }}"
                                method="POST"
                                onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                              Eliminar
                            </button>
                          </form>
                        </div>
                      @endif
                    </div>
                  @endforeach
                </div>
          </div>
        @endif
      @endif
      </div>
    </div>
  </div>
</div>
</div>
