<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>

    {{-- Primer CSS desde CDN --}}
    <link rel="stylesheet" href="https://unpkg.com/@primer/css@^20.2.4/dist/primer.css">
    <link rel="stylesheet" href="{{ asset('css/app-purple.css') }}">
</head>
<body>

    <div class="cuadro Box">
        <h1>Create Library</h1>
        <form action="{{ route('form.store') }}" method="post">
            @csrf

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            @error('title')
                <div class="alert">{{ $message }}</div>
            @enderror

            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="3" required></textarea>
            @error('content')
                <div class="alert">{{ $message }}</div>
            @enderror

            <label for="link">Link:</label>
            <input type="url" id="link" name="link" required>
            @error('link')
                <div class="alert">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="category_id">Category:</label>
                <select id="category_id" name="category_id" onchange="document.getElementById('new_category').style.display = this.value === 'new' ? 'block' : 'none';" required>
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                    <option value="new" {{ old('category_id') == 'new' ? 'selected' : '' }}>Other (add new)</option>
                </select>
                <input type="text" id="new_category" name="new_category" placeholder="New category name" style="display:{{ old('category_id') == 'new' ? 'block' : 'none' }};margin-top:10px;" value="{{ old('new_category') }}">
                @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('new_category')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Save</button>
        </form>
    </div>

</body>
</html>
