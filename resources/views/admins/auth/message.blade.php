@if ($message = Session::get('success'))
    <div class="col-sm-8 offset-sm-2 alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="col-sm-8 offset-sm-2 alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="col-sm-8 offset-sm-2 alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>{{ $error }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">❌</button>
        </div>
    @endforeach
@endif

@if ($message = Session::get('notMatch'))
    <div class="col-sm-8 offset-sm-2 alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
