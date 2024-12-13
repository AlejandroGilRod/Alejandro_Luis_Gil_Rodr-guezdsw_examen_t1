<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
</head> 

<body>
    <div class="container">
        <h1>Mensajes</h1>

         <button type="button" class="btn btn-create" onclick="window.location.href='/messages/create';">Crear Mensaje</button> 

        @if($messages->isEmpty())
            <p class="no-messages">No hay mensajes en la base de datos</p>
        @else
            <ul class="list-unstyled">
                @foreach($messages as $message)
                    <li class="message-item">
                    {{ $message->text }}
                    @if ($message->img)
                        <img src="{{ $message->img }}" alt="Sin imagen" width="100">
                    @endif
                        

                    </li> 
                @endforeach
            </ul>
        @endif
    </div>
    <a href="{{ route('eliminar.mensajes') }}"> eliminar algun mensaje?</a>

    <a href="{{ route('menu-lateral') }}">menu lateral</a>

</body>

</html>
