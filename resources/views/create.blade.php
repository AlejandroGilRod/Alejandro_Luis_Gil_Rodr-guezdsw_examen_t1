<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="{{ route('registrar.mensaje') }}" method="POST">
        @csrf
    
       <label for="mensaje">
            Mensaje:
            <textarea name="mensaje" id="mensaje" name="mensaje"></textarea>
        </label>
        
        <label for="imagen_url">URL Imagen:
            <input type="text" name="imagen_url">
        </label>
        <input type="submit" value="Registrar mensaje">
        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
    </form>
    <!-- Link para ver lista de mensajes -->
    <a href="{{ route('mostrar.mensajes') }}">Ver mensajes</a>
</body>
</html>