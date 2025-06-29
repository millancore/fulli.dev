<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="mb-4">
                    <a href="/" class="btn btn-outline-secondary">← Back</a>
                </div>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="card-title mb-4 text-center">Create Library</h1>
                        <form action="{{ route('form.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title:</label>
                                <input type="text" id="title" name="title" class="form-control" required value="{{ old('title') }}">
                                @error('title')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content:</label>
                                <textarea id="content" name="content" rows="3" class="form-control" required>{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="link" class="form-label">Link:</label>
                                <input type="url" id="link" name="link" class="form-control" required value="{{ old('link') }}">
                                @error('link')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category:</label>
                                <select id="category_id" name="category_id" class="form-select" onchange="document.getElementById('new_category').style.display = this.value === 'new' ? 'block' : 'none';" required>
                                    <option value="">Select a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                    <option value="new" {{ old('category_id') == 'new' ? 'selected' : '' }}>Other (add new)</option>
                                </select>
                                <input type="text" id="new_category" name="new_category" class="form-control mt-2" placeholder="New category name" style="display:{{ old('category_id') == 'new' ? 'block' : 'none' }};" value="{{ old('new_category') }}">
                                @error('category_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                @error('new_category')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
