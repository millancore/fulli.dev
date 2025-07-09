<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Document')</title>
    @vite('resources/js/app.js')
</head>
<body>
@yield('content')
</body>
</html>
