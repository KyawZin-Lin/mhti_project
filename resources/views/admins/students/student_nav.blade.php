<a href="{{ route('admin.students.index') }}"><button type="button"
        class="btn btn-md btn-info mr-1 @yield('all-student')">All</button></a>

<a href="{{ route('admin.activeStudent') }}"><button type="button"
        class="btn btn-md btn-info mr-1 @yield('active-student')">Active
        Student</button></a>

<a href="{{ route('admin.alumnus') }}"><button type="button"
        class="btn btn-md btn-info mr-1 @yield('alumnus-student')">Alumni</button></a>

<a href="{{ route('admin.oversea') }}"><button type="button"
        class="btn btn-md btn-info mr-1 @yield('oversea-student')">Oversea</button></a>

<a href="{{ route('admin.complete_payment_student') }}"><button type="button"
        class="btn btn-md btn-info mr-1 @yield('complete-student')">Complete
        Payment Student</button></a>

<a href="{{ route('admin.incomplete_payment_student') }}"><button type="button"
        class="btn btn-md btn-info mr-1 @yield('incomplete-student')">Incomplete Payment Student</button></a>

<a href="{{ route('admin.future_interests.index') }}" target="_blank"><button type="button"
        class="btn btn-md btn-info mr-1 @yield('future-interest-active')">Future
        Interest</button></a>

<a href="{{ route('admin.source_surveys.index') }}" target="_blank"><button type="button"
        class="btn btn-md btn-info mr-1 @yield('source-survey-active')">Source
        Survey</button></a>


{{-- <a href="{{ route('admin.enrollment') }}"><button type="button"
        class="btn btn-md btn-info mr-1 @yield('enrollment-student')">Enrollment</button></a> --}}

{{-- <form action="{{ route('approveAll') }}" method="GET">
        @csrf

        <button type="submit" class="btn btn-md btn-primary">Approve All</button>
    </form> --}}



{{-- <a href="{{ route('student-export') }}"><button type="button"
            class="btn btn-md btn-primary">Export</button></a>
    <button type="button" class="btn btn-md btn-primary" data-toggle="modal"
        data-target="#stuModal">Import</button> --}}
