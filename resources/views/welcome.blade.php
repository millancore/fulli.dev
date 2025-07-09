<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  @extends('layout.app_sidebar')

  @section('sidebar')
    @include('components.sidebar')
  @endsection

  @section('content')
    <div class="main-content flex-grow-1 p-4">
      <h2>Hello world here</h2>
    </div>
  @endsection
</body>
</html>
