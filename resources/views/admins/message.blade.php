@if ($message = Session::get('success'))
    <div class="col-sm-8 offset-sm-2 alert alert-success fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="col-sm-8 offset-sm-2 alert alert-danger fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="col-sm-8 offset-sm-2 alert alert-warning fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="col-sm-8 offset-sm-2 alert alert-info fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="col-sm-8 offset-sm-2 alert alert-danger fade show" role="alert">
            <strong>{{ $error }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif

@if ($message = Session::get('notMatch'))
    <div class="col-sm-8 offset-sm-2 alert alert-danger fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
