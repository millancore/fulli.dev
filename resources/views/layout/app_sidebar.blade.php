<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Document')</title>
  @vite('resources/js/app.js')
</head>
<body class="bg-light">


  <div class="container-fluid d-flex min-vh-100 p-0" style="background-color: #ede9fe;">

  <button class="btn btn-sm btn-primary d-md-none m-3" onclick="toggleSidebar()">
    ☰ Mostrar sidebar
  </button>

    <div class="w-25 border-left px-3 py-4 d-none d-md-block" style="background-color: #ede9fe;">
      @yield('sidebar')
    </div>

    <div class="w-100 w-md-75 px-4 py-4">
      @yield('content')
    </div>
  </div>  
</body>

</html>
