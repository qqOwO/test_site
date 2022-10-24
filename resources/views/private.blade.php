@extends('app')

@section('title')
    Личная страница
@endsection

@section('content')
<div class="container">    
    <h1 style="color: #e0a800">Добро пожаловать!</h1>
    <a href="{{ route('user.logout') }}"><button>Выйти</button></a>
</div>
@endsection