<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Document')</title>
    @vite('resources/js/app.js')
</head>
<body>
  <div class="container" style="max-width:none;width:100vw;height:100vh;margin:0;background:none;border-radius:0;box-shadow:none;padding:0;display:flex;flex-direction:row;align-items:stretch;">
    <div class="sidebar d-flex flex-column justify-content-between p-3" style="min-width:220px; background-color: #f5eafd;">
      @yield('sidebar')
    </div>
    <div class="main-content flex-grow-1 p-4">
      @yield('content')
    </div>
  </div>
</body>
</html>
