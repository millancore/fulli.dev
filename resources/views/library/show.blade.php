@extends('layout.app_sidebar')

@section('content')
<div class="min-vh-100 py-5 border-top" style="background-color: #ede9fe;">
  <div class="p-4 rounded" style="background-color: #ede9fe;">
    <h2 class="text-center my-4">{{ $article->title }}</h2>
    <p class="mt-3 ps-2">{{ $article->content }}</p>
    <p class="mt-3 ps-2">
      <strong>Link:</strong>
      <a href="{{ $article->link }}" target="_blank" class="text-decoration-none text-primary">{{ $article->link }}</a>
    </p>
  </div>

@endsection

@section('sidebar')
  @include('components.sidebar', ['category' => $category])
@endsection
