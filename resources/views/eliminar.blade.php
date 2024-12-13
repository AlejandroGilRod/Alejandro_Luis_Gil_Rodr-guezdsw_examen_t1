<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminación de mensajes</title>
</head>
<body>
    <h1>Eliminar mensajes</h1>
    <form action="{{ route('prosesar.eliminar.mensajes') }}" method="POST">
        @csrf
        <label for="mensajes">
            Selecciona los mensajes a eliminar:
            <select name="messages[]" id="messages" multiple>
                @foreach ($registro_mensajes as $message)
                    <option value="{{ $message->id }}">{{ $message->text }}</option>
                @endforeach
            </select>
            <button type="submit">Eliminar mensajes</button>
        </label>
        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
    </form>
    <a href="{{ route('messages') }}">Volver</a>

</body>
</html>