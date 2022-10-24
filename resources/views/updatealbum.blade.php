@extends('app')

@section('title')Изменение альбома @endsection

@section('content')
        <div class="p-md-3">
            <div class="container" style="background-color: #232323">
                <div class="main-content">
                    <h1 style="color: #e0a800">Форма добавления альбома</h1>
                    <form action="{{ route('user.update_album', $album->id) }}" method="POST" style="padding-left: 1%">
                        @csrf
                        <label for="title">Введите название альбома</label><br>
                        <input type="text" name="title" value="{{$album->title}}" placeholder="Название альбома" id="title"><br>
                        <label for="name">Введите имя исполнителя</label><br>
                        <input type="text" name="name" value="{{$album->name}}" placeholder="Имя исполнителя" id="name"><br>
                        <label for="description">Введите описание альбома</label><br>
                        <textarea name="description" id="description" placeholder="Описание альбома">{{$album->description}}</textarea><br>
                        <div style="padding-top: 1%">
                            <button type="submit">Изменить</button>
                        </div>
                    </form>
                    <div style="padding: 1%;">
                        <a href="{{ route('user.delete_album', $album->id) }}"><button>Удалить</button></a>
                    </div>
                </div>
            </div>
        </div>
@endsection