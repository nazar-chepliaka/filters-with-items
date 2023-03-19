@if(session('success'))
    <div class="alert alert-success alert-dismissible">
        {{session('success')}}
    </div>
@endif

@if(session('alert'))
    <div class="alert alert-warning alert-dismissible">
        {{session('alert')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible">
        {{session('error')}}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
