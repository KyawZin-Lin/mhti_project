@extends('users.master')

@section('announcement-active', 'active')

@section('content')
    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Title -->
                <h1 class="mt-4">{{ $announcement->title }}</h1>

                <!-- Author -->
                <p class="lead">
                    by
                    <span
                        class="badge bg-color">{{ $announcement->adminUser != null ? $announcement->adminUser->name : '-' }}</span>
                </p>

                <hr>

                <!-- Date/Time -->
                <p>Posted on {{ date('F j, Y', strtotime($announcement->created_at)) }} at
                    {{ date('h:m A', strtotime($announcement->created_at)) }}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="{{ asset('photos/announcements/' . $announcement->photo) }}"
                    alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead text-justify">{{ $announcement->description }}</p>


                <hr>

                <!-- Single Comment -->
                {{-- <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                        purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                        vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div> --}}

                <!-- Comment with nested comments -->
                {{-- <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                        purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                        vulputate fringilla. Donec lacinia congue felis in faucibus.

                        <div class="media mt-4">
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Commenter Name</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                                Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc
                                ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>

                        <div class="media mt-4">
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Commenter Name</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                                Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc
                                ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>

                    </div>
                </div> --}}

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('user.announcements') }}">
                            <button type="button" class="btn btn-lg btn-default float-right mt-4">◀</button>
                        </a>
                    </div>
                </div>

                {{-- <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form action="{{ route('user.comment.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="announcement_id" value="{{ $announcement->id }}">
                            <div class="form-group">
                                <textarea class="form-control" name="comment" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-color w-100">Submit</button>
                        </form>
                    </div>
                </div> --}}

                {{-- @foreach ($announcement_comments as $announcement_comment)
                    <div class="card mb-1">
                        <div class="card-body">
                            <div class="media mb-4">
                                <img class="d-flex mr-3 rounded-circle"
                                    src="https://ui-avatars.com/api/?name={{ $announcement_comment->student->name }}&background=000080&color=fff"
                                    alt="" style="width: 30px;height:30px;">
                                <div class="media-body text-justify">
                                    <h5 class="mt-0">
                                        {{ $announcement_comment->student != null ? $announcement_comment->student->name : '' }}
                                    </h5>
                                    {{ $announcement_comment->comment }}

                                </div>

                            </div>
                            <h6 style="float: right;color:#000080;">
                                {{ $announcement_comment->created_at->diffForHumans() }}</h6>
                        </div>
                    </div>
                @endforeach

                <div style="float: right;">
                    {{ $announcement_comments->withQueryString()->links() }}
                </div> --}}

                {{-- <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div> --}}

            </div>

        </div>
        <!-- /.row -->

    </div>
@endsection
