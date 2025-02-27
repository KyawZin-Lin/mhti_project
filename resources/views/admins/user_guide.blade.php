@extends('admins.master')

@section('user-guide-active', 'active')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                @role('Admin')
                    <iframe src="{{ asset('user_guides/admin.pdf') }}" frameborder="0" width="100%" height="700"></iframe>
                @endrole
                @role('Director')
                    <iframe src="{{ asset('user_guides/director.pdf') }}" frameborder="0" width="100%" height="700"></iframe>
                @endrole
                @role('Front Staff')
                    <iframe src="{{ asset('user_guides/frontstaff.pdf') }}" frameborder="0" width="100%"
                        height="700"></iframe>
                @endrole
                @role('Office Manager')
                    <iframe src="{{ asset('user_guides/officemanger.pdf') }}" frameborder="0" width="100%"
                        height="700"></iframe>
                @endrole
                @role('Teacher')
                    <iframe src="{{ asset('user_guides/teacher.pdf') }}" frameborder="0" width="100%" height="700"></iframe>
                @endrole
            </div>
        </div>

    </div>
@endsection
