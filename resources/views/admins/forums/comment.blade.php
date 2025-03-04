@extends('admins.master')

@section('forum-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">

                <!-- Post Content Column -->
                <div class="col-lg-12">

                    <!-- Title -->
                    <div class="d-flex justify-content-between">
                        <h1 class="mt-4">{{ $forum->title }}</h1>

                        <a href="{{ route('admin.forums.index') }}">
                            <button type="button" class="btn btn-md btn-danger float-right mt-4">Back</button>
                        </a>
                    </div>
                    <hr>

                    <!-- Date/Time -->
                    <p>Posted on {{ date('F j, Y', strtotime($forum->created_at)) }} at
                        {{ date('h:m A', strtotime($forum->created_at)) }}</p>

                    <hr>

                </div>

                <div class="col-sm-6">
                    <img class="img-fluid rounded" src="{{ asset('photos/forums/' . $forum->photo) }}" alt="">

                    <p class="lead text-justify my-3">{{ $forum->description }}</p>

                </div>

                <div class="col-sm-6">
                    <h6><b>Comments</b></h6>
                    @foreach ($forum_comments as $forum_comment)
                        <div class="card mb-1">
                            <div class="card-body">
                                <div class="media mb-4">
                                    <img class="d-flex mr-3 rounded-circle"
                                        src="https://ui-avatars.com/api/?name={{ $forum_comment->student->name }}&background=000080&color=fff"
                                        alt="" style="width: 30px;height:30px;">
                                    <div class="media-body text-justify">
                                        <h5 class="mt-0">
                                            {{ $forum_comment->student != null ? $forum_comment->student->name : '' }}
                                        </h5>
                                        {{ $forum_comment->comment }}

                                    </div>

                                </div>
                                <h6 style="float: right;color:#000080;">
                                    {{ $forum_comment->created_at->diffForHumans() }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>



                <!-- Single Comment -->


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

        </div>
    </div>
@endsection
