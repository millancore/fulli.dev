@extends('layout.app_sidebar')

@section('sidebar')
  <div class="p-4 d-flex flex-column justify-content-between h-100" style="min-width:240px;">
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
@endsection

@section('content')
  <div class="card shadow-sm">
    <div class="card-body">
      <h1 class="card-title mb-3">{{ $article->title ?? 'No title' }}</h1>
      <div class="card-text">{{ $article->content ?? '' }}</div>
    </div>
  </div>
@endsection
