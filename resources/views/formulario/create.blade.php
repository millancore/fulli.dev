<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Artículo</title>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
</head>
<body>
    <div class="container">
        <div class="main-content" style="width:100%">
            <h1>Crear nuevo artículo</h1>
            <form action="{{ route('form.store') }}" method="post">
                @csrf
                <div>
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="title" required>
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="contenido">Contenido:</label>
                    <textarea id="contenido" name="content" rows="6" required></textarea>
                    @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="link">Link:</label>
                    <input type="url" id="link" name="link" required>
                    @error('link')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit">Guardar</button>
            </form>
        </div>
    </div>
</body>
</html>
