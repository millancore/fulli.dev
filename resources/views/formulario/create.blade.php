@extends('layout.app_sidebar')

@section('content')
<div class="d-flex align-items-center my-5" style="background-color: #ede9fe;">
    <div class="w-100" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="card-title my-3 text-center">
                    {{ $isEdit ? 'Edit Article' : 'Create Article' }}
                </h1>

                <form 
                    action="{{ $isEdit ? route('articles.update', $article->id) : route('form.store') }}" 
                    method="post"
                >
                    @csrf
                    @if($isEdit)
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" id="title" name="title" class="form-control" required 
                            value="{{ old('title', $article->title ?? '') }}">
                        @error('title')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content:</label>
                        <textarea id="content" name="content" rows="3" class="form-control" required>{{ old('content', $article->content ?? '') }}</textarea>
                        @error('content')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label">Link:</label>
                        <input type="url" id="link" name="link" class="form-control" required 
                            value="{{ old('link', $article->link ?? '') }}">
                        @error('link')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category:</label>
                        <select id="category_id" name="category_id" class="form-select"
                            onchange="document.getElementById('new_category').style.display = this.value === 'new' ? 'block' : 'none';" required>
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $myCategory->id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                            <option value="new" {{ old('category_id') == 'new' ? 'selected' : '' }}>Other (add new)</option>
                        </select

                        <input type="text" id="new_category" name="new_category" class="form-control mt-2" placeholder="New category name"
                            style="display:{{ old('category_id') == 'new' ? 'block' : 'none' }};"
                            value="{{ old('new_category') }}">

                        @error('category_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror

                        @error('new_category')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn w-100 text-white" style="background-color: #ad46ff;">
                        {{ $isEdit ? 'Update' : 'Save' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('sidebar')
  @include('components.sidebar', ['category' => $myCategory ?? null])
@endsection
