@if($errors->any())
    <div class="container p-md-3">
        <div class="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if(session('success'))
    <div class="container p-md-3">
        <div class="alert">
            {{ session('success') }}
        </div>
    </div>
@endif
