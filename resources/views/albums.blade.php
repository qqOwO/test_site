@extends('app')

@section('title')
    Список альбомов
@endsection

@section('content')
    @foreach($album as $el)
        <div class="p-md-3">
            <div class="container" style="background-color: #232323">
                <div class="row">    
                    <div class="col-md-2">
                        <img src="{{ $el->image }}", alt="{{ $el->name }}" style="padding: 2%"/>
                    </div>
                    <div class="col-md-9">
                        <h1 style="color: #e0a800; word-wrap: break-word">{{ $el->name }}</h1>
                        <p style="font-size: x-large; color: #F7E5A1; word-wrap: break-word">{{ $el->title }}</p>
                        <p style="color: #F7E5A1; word-break: break-word">{{ $el->description }}</p>
                        <div class="container-fluid" style="padding-top: 1%; display: flex">
                            <a href="{{ route('user.update_album', $el->id) }}" style="padding-right: 1%; padding-bottom: 1%;"><button>Редактировать</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection