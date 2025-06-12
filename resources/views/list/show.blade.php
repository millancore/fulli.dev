<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Artículo</title>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div id="sidebar-content">
                <div class="sidebar-header">
                    <span class="sidebar-title">Links</span>
                    <a href="/" class="sidebar-volver">Volver</a>
                </div>
                <div class="sidebar-list">
                    @if(isset($articulo) && $articulo->links)
                        <a href="{{ $articulo->links }}" target="_blank">{{ $articulo->links }}</a>
                    @else
                        <span>No hay links</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="main-content">
            <div>
                <h1>{{ $articulo->titulo ?? 'Sin título' }}</h1>
                <div>{{ $articulo->contenido ?? '' }}</div>
            </div>
        </div>
    </div>
</body>
</html>
