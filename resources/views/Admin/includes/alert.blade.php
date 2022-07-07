@if($errors->any())
    {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div> --}}
    <div class="alert alert-danger"> 
     {{--<div class="alert alert-danger alert-dismissible fade show" role="alert"> --}}
        @foreach($errors->all() as $error)
            <p> {{ $error }} </p>
             {{--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
        @endforeach
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success"> 
    {{--<div class="alert alert-success alert-dismissible fade show" role="alert"> --}}
        <p> {{ session('success') }}</p>
        {{--<button type="button" class="btn-close" aria-label="Close"></button>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning">
        <p> {{ session('warning') }}</p>
    </div>
@endif

