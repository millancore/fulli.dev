<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div style="width:100%">
                @if(isset($articulos) && count($articulos) > 0)
                    @foreach($articulos as $articulo)
                        <form action="{{ route('list.show', ['id' => $articulo->id]) }}" method="get">
                            <button type="submit">{{ $articulo->titulo }}</button>
                        </form>
                    @endforeach
                @else
                    <span>No hay artículos</span>
                @endif
            </div>
        </div>
        <div class="main-content">
            Hola mundo aquí
        </div>
    </div>
</body>
</html>

