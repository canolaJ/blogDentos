<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/logoDentos.png') }}" type="image/png" sizes="40x40">
    <title>BlogDentos</title>
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontAwesome/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">
</head>
<body>
    @yield('content')
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
</body>
</html>