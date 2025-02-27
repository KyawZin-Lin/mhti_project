@extends('users.master')

@section('forum-active', 'active')

@section('content')
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


                <h1 class="animation my-4">Forums</h1>

                @foreach ($forums as $forum)
                    <div class="card mb-4">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <h2 class="card-title">{{ $forum->title }}</h2>
                                    <p class="card-text">{{ $forum->description }}</p>

                                    <div class="text-center">
                                        <img src="{{ asset('photos/forums/' . $forum->photo) }}" alt="Card image cap"
                                            style="widht:100px;height:100px;" class="forum-img">
                                    </div>
                                    <div class="mt-2" style="float:right;">
                                        Posted on {{ date('F j, Y', strtotime($forum->created_at)) }} by
                                        <span
                                            class="badge bg-color">{{ $forum->adminUser != null ? $forum->adminUser->name : '-' }}</span>
                                    </div>

                                </div>

                                <div class="col-sm-12 forum-comment mb-3">
                                    <hr>

                                    <form action=" {{ route('user.comment.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                                        <div class="input-group">
                                            <input type="text" name="comment" class="form-control">
                                            <span class="input-group-append">
                                                <button class="btn btn-color" type="submit"><i
                                                        class="fas fa-paper-plane"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-12" style="height: 100px;overflow: auto;">
                                    @foreach ($forum_comments as $forum_comment)
                                        @if ($forum_comment->forum_id == $forum->id)
                                            <div>
                                                <h6 style="font-size: 14px;" class="text-muted text-justify">
                                                    {{ $forum_comment->comment }}
                                                </h6>
                                                <div class="text-right">
                                                    <small
                                                        class="badge badge-success">{{ $forum_comment->created_at->diffForHumans() }}
                                                        by
                                                        {{ $forum_comment->student != null ? $forum_comment->student->name : '' }}</small>
                                                </div>
                                            </div>
                                            <hr>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="pagination justify-content-center mb-4">
                    {{ $forums->withQueryString()->links() }}
                </div>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <form action="{{ route('user.forum.index') }}" method="GET">
                    @csrf

                    <div class="card my-4">
                        <h5 class="card-header">Search</h5>
                        <div class="card-body">
                            <div class="input-group">
                                <input type="text" name="title" class="form-control" value="{{ request()->title }}"
                                    placeholder="Search for...">
                                <span class="input-group-append">
                                    <button class="btn btn-color" type="submit">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>

                {{-- <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">Web Design</a>
                                    </li>
                                    <li>
                                        <a href="#">HTML</a>
                                    </li>
                                    <li>
                                        <a href="#">Freebies</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">JavaScript</a>
                                    </li>
                                    <li>
                                        <a href="#">CSS</a>
                                    </li>
                                    <li>
                                        <a href="#">Tutorials</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature
                        the new Bootstrap 4 card containers!
                    </div>
                </div> --}}

            </div>

        </div>
        <!-- /.row -->

    </div>
@endsection

@section('script')

@endsection
