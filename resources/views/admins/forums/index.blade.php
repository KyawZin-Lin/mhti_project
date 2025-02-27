@extends('admins.master')

@section('forum-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between mb-4 title-bar">
                    <div>Forum List</div>
                    <a href="{{ route('admin.forums.create') }}"><button type="button" class="btn btn-md btn-success"><b><i
                                    class="fas fa-plus-square"></i>
                                New Forum</b></button></a>
                </div>
                <div class="col-sm-2">
                    <h5>Total - {{ $forums_count }}</h5>
                </div>
                <div class="col-sm-10">
                    <form action="{{ route('admin.forums.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">
                            <div class="col-sm-4 m-0 p-0">
                                <div class="row">
                                    <div class="col-sm-7 m-0 p-0">

                                        <input type="text" name="search" id="search" class="form-control bg-white"
                                            value="{{ request()->search }}" placeholder="Search Title...">
                                    </div>

                                    <div class="col-sm-5">
                                        <button type="submit"
                                            class="btn btn-md btn-theme btn-success w-100">Search</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Photo</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($forums as $forum)
                                    <tr>
                                        <td>{{ $forum->title }}</td>
                                        <td><img src="{{ asset('photos/forums/' . $forum->photo) }}" alt=""
                                                style="width:50px;height:50px;"></td>
                                        <td>{{ Illuminate\Support\Str::limit($forum->description, 20) }}
                                        </td>
                                        <td>
                                            {{-- <a href="{{ route('admin.forums.show', $forum->id) }}">
                                                <button class="btn btn-sm btn-color float-left mr-1">Comment</button>
                                            </a> --}}
                                            <a href="{{ route('admin.forums.edit', $forum->id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1">Edit</button></a>

                                            <form action="{{ route('admin.forums.destroy', $forum->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="float-right">
                        {{ $forums->withQueryString()->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">

                </div>

            </div>
        </div>

    </section>
@endsection

@section('script')
    <script></script>
@endsection
