@extends('users.master')

@section('announcement-active', 'active')

@section('content')
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


                <h1 class="animation my-4">Announcements</h1>

                @foreach ($announcements as $announcement)
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{ asset('photos/announcements/' . $announcement->photo) }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">{{ $announcement->title }}</h2>
                            <p class="card-text">{{ Illuminate\Support\Str::limit($announcement->description, 100) }}</p>

                            <a href="{{ route('user.announcements.detail', $announcement->id) }}"
                                class="btn btn-primary">Read More &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on {{ date('F j, Y', strtotime($announcement->created_at)) }} by
                            <span
                                class="badge bg-color">{{ $announcement->adminUser != null ? $announcement->adminUser->name : '-' }}</span>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="pagination justify-content-center mb-4">
                    {{ $announcements->withQueryString()->links() }}
                </div>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <form action="{{ route('user.announcements') }}" method="GET">
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
