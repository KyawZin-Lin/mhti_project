@extends('admins.master')

@section('source-survey-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between mb-4 title-bar">
                    <div>Source Survey List</div>

                    <div>


                        <a href="{{ route('admin.source_surveys.create') }}"><button type="button"
                                class="btn btn-md btn-success"><b><i class="fas fa-plus-square"></i>
                                    New Source Survey</b></button></a>

                        <a href="{{ route('admin.dashboard') }}"><button type="button" class="btn btn-md btn-danger"><b><i
                                        class="fas fa-home"></i>
                                    Home</b></button></a>
                    </div>
                </div>
                <div class="col-sm-2">
                    <h5>Total - {{ $source_surveys->total() }}</h5>
                </div>
                <div class="col-sm-10">
                    <form action="{{ route('admin.source_surveys.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">
                            <div class="col-sm-4 m-0 p-0">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" class="form-control" placeholder="Search Name..."
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
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
                                @foreach ($source_surveys as $source_survey)
                                    <tr>
                                        <td>{{ $source_survey->name }}</td>

                                        <td>
                                            <a href="{{ route('admin.source_surveys.edit', $source_survey->id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1">Edit</button></a>

                                            <form action="{{ route('admin.source_surveys.destroy', $source_survey->id) }}"
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
                        {{ $source_surveys->withQueryString()->links() }}
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
