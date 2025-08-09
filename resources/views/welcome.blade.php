<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  @extends('layout.app_sidebar')

  @section('sidebar')
    @include('components.sidebar')
  @endsection

  @section('content')
  <div class="vh-100 d-flex flex-column justify-content-center align-items-center text-center border-dark-strong" style="background-color: #6a58f0;">
    <div class="px-3">
      <h1 class="text-light mb-3">PHP Answered: Your Clear Guide to PHP</h1>
      <p class="text-light">
        Feeling confused by PHP? Find clear answers, practical examples, and simple explanations to help you master this powerful web language.<br> Learn step by step with hands-on guidance.
      </p>
    </div>
  </div>
  @endsection
</body>
</html>
