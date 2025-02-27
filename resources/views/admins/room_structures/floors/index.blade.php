@extends('admins.master')

@section('room-structure-active', 'active')

@section('floor-active', 'nav-active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4 mb-4 title-bar">
                    <div>Floor List</div>
                </div>
                <div class="col-sm-6 text-right">
                    @include('admins.room_structures.nav')
                </div>

                <div class="col-sm-2">
                    <a href="{{ route('admin.floors.create') }}"><button type="button" class="btn btn-md btn-success"
                            style="float:right;"><b><i class="fas fa-plus-square"></i>
                                Create Floor</b></button></a>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-2">
                    <h5>Total - {{ $floors->total() }}</h5>
                </div>
                <div class="col-sm-10">
                    <form action="{{ route('admin.floors.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">
                            <div class="col-sm-4 m-0 p-0">
                                <div class="row">
                                    <div class="col-sm-7 m-0 p-0">

                                        <input type="text" name="search" id="search" class="form-control bg-white"
                                            value="{{ request()->search }}" placeholder="Search floor...">
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
                                    <th>floor</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($floors as $floor)
                                    <tr>
                                        <td>{{ $floor->name }}</td>
                                        <td>

                                            <a href="{{ route('admin.floors.edit', $floor->id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1">Edit</button></a>

                                            <form action="{{ route('admin.floors.destroy', $floor->id) }}" method="POST">
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
                        {{ $floors->withQueryString()->links() }}
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
