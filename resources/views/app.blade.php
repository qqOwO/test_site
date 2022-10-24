<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
    <title>@yield("title")</title>
</head>
<body>
    <div class="container-fluid" style="background-color: #232323">
        <div class="container">
            <div class="header">
                <a href="{{ route('home') }}" style="font-size: xx-large">Справочник по музыкальным альбомам</a>
                <a class="article" href="{{ route('user.create_album') }}" style="font-size: x-large">Создание альбома</a>
                <a class="login" href="{{ route('user.login') }}" style="font-size: x-large">Вход</a>
            </div>
        </div>
    </div>
    @include('messages')
    @yield("content")
    <footer>
        <div class="container-fluid" style="background-color: #232323">
            <div class="container">
            </div>
        </div>
    </footer>
</body>
</html>
