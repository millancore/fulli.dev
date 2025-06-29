<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Articles</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="card-title mb-4 text-center">All Library</h1>
                    <div class="mb-4">
                        <a href="/" class="btn btn-outline-secondary">← Back</a>
                    </div>
                    @if($articles->isEmpty())
                        <div class="alert alert-info text-center">No Library found.</div>
                    @else
                        <div class="list-group">
                            @foreach($articles as $article)
                                <div class="list-group-item mb-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="fw-bold">{{ $article->title }}</div>
                                            <div class="text-muted small">{{ \Illuminate\Support\Str::limit($article->content, 120) }}</div>
                                        </div>
                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
