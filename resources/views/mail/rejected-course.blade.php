<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        Este es un correo de prueba
    </h1>
    <p>El curso <strong>{{ $course->name }}</strong> está <span class='text-red-700 font-bold'>rechazado</span></p>
    <h2>
        Motivo del RECHAZO
    </h2>
    {!! $course->observation->body !!}

</body>
</html>
