<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library View</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid vh-100 d-flex flex-row p-0">
    <div class="bg-light p-4 d-flex flex-column justify-content-between" style="min-width:240px;">
        <div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <span class="fw-bold fs-5">Links</span>
                <a href="/" class="btn btn-outline-secondary btn-sm">← Back</a>
            </div>
            <div>
                @if(isset($article) && $article->link)
                  <a href="{{ $article->link }}" target="_blank">{{ $article->link }}</a>
                @else
                  <span class="text-muted">No links</span>
                @endif
            </div>
        </div>
    </div>
    <div class="flex-grow-1 p-5">
      <div class="card shadow-sm">
        <div class="card-body">
          <h1 class="card-title mb-3">{{ $article->title ?? 'No title' }}</h1>
          <div class="card-text">{{ $article->content ?? '' }}</div>
        </div>
      </div>
    </div>
</div>
</body>
</html>
