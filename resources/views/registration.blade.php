@extends('app')

@section('title')
    Регистрация
@endsection

@section('content')
    <div class="container">    
        <h1 style="color: #e0a800">Регистрация</h1>
        <form class="col-3 offset" method="POST" action="{{ route('user.registration') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="col-form-label-lg">Ваш email</label>
                <input class="form-control" id="email" name="email" type="text" value="" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password" class="col-form-label-lg">Пароль</label>
                <input class="form-control" id="password" name="password" type="password" value="" placeholder="Пароль">
            </div>
            <div class="form-group" style="padding: 3%">
                <button type="submit" name="sendMe" value="1">Зарегистрироваться</button>
            </div>
        </form>
    </div>    
@endsection