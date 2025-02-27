@extends('admins.master')

@section('future-interest-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between mb-4 title-bar">
                    <div>Future Interest List</div>

                    <div>


                        <a href="{{ route('admin.future_interests.create') }}"><button type="button"
                                class="btn btn-md btn-success"><b><i class="fas fa-plus-square"></i>
                                    New Future Interest</b></button></a>

                        <a href="{{ route('admin.dashboard') }}"><button type="button" class="btn btn-md btn-danger"><b><i
                                        class="fas fa-home"></i>
                                    Home</b></button></a>
                    </div>
                </div>
                <div class="col-sm-2">
                    <h5>Total - {{ $future_interests->total() }}</h5>
                </div>
                <div class="col-sm-10">
                    <form action="{{ route('admin.future_interests.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">
                            <div class="col-sm-4 m-0 p-0">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" class="form-control" placeholder="Search Name..."
                                        aria-label="Recipient's username" aria-describedby="button-addon2"
                                        value="{{ request()->search }}">
                                    <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
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
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($future_interests as $future_interest)
                                    <tr>
                                        <td>{{ $future_interest->name }}</td>

                                        <td>
                                            <a href="{{ route('admin.future_interests.edit', $future_interest->id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1">Edit</button></a>

                                            <form
                                                action="{{ route('admin.future_interests.destroy', $future_interest->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="btn btn-sm btn-danger show_confirm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="float-right">
                        {{ $future_interests->withQueryString()->links() }}
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
