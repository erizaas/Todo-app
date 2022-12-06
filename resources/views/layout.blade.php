<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/register.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    {{-- <script src="https://kit.fontawesome.com/d2b838b27e.js" crossorigin="anonymous"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{asset('assets/img/todo.png')}}" type="image/x-icon">
    <title>Todo App</title>
</head>
<body>


@yield('content')
</body>
</html>