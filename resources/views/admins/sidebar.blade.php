<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon bg-icon icon">
            <img src="{{ asset('photos/icons/logo.png') }}" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('dashboard-active')">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item @yield('enrollment-active')">
        <a class="nav-link" href="{{ route('admin.enrollment') }}">
            <i class="fas fa-list-alt"></i>
            <span>Enrollment</span></a>
    </li>

    <li class="nav-item @yield('student-active')">
        <a class="nav-link" href="{{ route('admin.students.index') }}">
            <i class="fas fa-user-graduate"></i>
            <span>Students</span></a>
    </li>

    <li class="nav-item @yield('registration-active')">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#registration"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-file-invoice"></i>
            <span>Voucher</span>
        </a>
        <div id="registration" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <a class="collapse-item @yield('qcategory-active')"
                    href="{{ route('admin.question_categories.index') }}">Question Categories</a> --}}
                <a class="collapse-item @yield('create-registration-active')" href="{{ route('admin.chooseType') }}">Create
                    Voucher</a>

                <a class="collapse-item @yield('list-active')" href="{{ route('admin.registrations.index') }}">List</a>

            </div>
        </div>
    </li>

    <li class="nav-item @yield('payment-type-active')">
        <a class="nav-link" href="{{ route('admin.payment_types.index') }}">
            <i class="fab fa-amazon-pay"></i>
            <span>Payment Type</span></a>
    </li>

    <li class="nav-item @yield('room-structure-active')">
        <a class="nav-link" href="{{ route('admin.rooms.index') }}">
            <i class="fas fa-hotel"></i>
            <span>Rooms</span></a>
    </li>

    <li class="nav-item @yield('teacher-active') @yield('teacher-attendance-active')">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#teacher" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Teachers</span>
        </a>
        <div id="teacher" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @yield('teacher-active')" href="{{ route('admin.teachers.index') }}">Teachers</a>

                <a class="collapse-item @yield('teacher-attendance-active')"
                    href="{{ route('admin.teacher_attendances.index') }}">Teachers Attendance List</a>
            </div>
        </div>
    </li>

    {{-- <li class="nav-item @yield('teacher-active')">
        <a class="nav-link" href="{{ route('admin.teachers.index') }}">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Teachers</span></a>
    </li>

    <li class="nav-item @yield('teacher-attendance-active')">
        <a class="nav-link" href="{{ route('admin.teacher_attendances.index') }}">
            <i class="fas fa-clipboard-list"></i>
            <span>Teachers Attendance List</span></a>
    </li> --}}

    <li class="nav-item @yield('staff-active')">
        <a class="nav-link" href="{{ route('admin.staff.index') }}">
            <i class="fas fa-user"></i>
            <span>Staff</span></a>
    </li>

    <li class="nav-item @yield('staff-leave-active')">
        <a class="nav-link" href="{{ route('admin.teacher_leaves.index') }}">
            <i class="fas fa-calendar-day"></i>
            <span>Leaves</span></a>
    </li>

    {{-- <li class="nav-item @yield('academic-year-active')">
        <a class="nav-link" href="{{ route('admin.academic_years.index') }}">
            <i class="fas fa-calendar-alt"></i>
            <span>Academic Years</span></a>
    </li> --}}

    {{-- <li class="nav-item @yield('classroom-active')">
        <a class="nav-link" href="{{ route('admin.classrooms.index') }}">
            <i class="fas fa-house-user"></i>
            <span>Class</span></a>
    </li> --}}

    <li class="nav-item @yield('degree-active')">
        <a class="nav-link" href="{{ route('admin.degrees.index') }}">
            <i class="fas fa-calendar"></i>
            <span>Courses</span></a>
    </li>

    {{-- <li class="nav-item @yield('batch-active')">
        <a class="nav-link" href="{{ route('admin.batches.index') }}">
            <i class="fas fa-list"></i>
            <span>Batch</span></a>
    </li> --}}

    <li class="nav-item @yield('attendance-active')">
        <a class="nav-link" href="{{ route('admin.absents') }}">
            <i class="fas fa-clipboard-list"></i>
            <span>Absent Lists</span></a>
    </li>

    {{-- <li class="nav-item @yield('course-active')">
        <a class="nav-link" href="{{ route('admin.courses.index') }}">
            <i class="fas fa-file-alt"></i>
            <span>Courses</span></a>
    </li> --}}

    <li class="nav-item @yield('job-active')">
        <a class="nav-link" href="{{ route('admin.jobs.index') }}">
            <i class="fas fa-layer-group"></i>
            <span>Job Positions</span></a>
    </li>

    <li class="nav-item @yield('log-history-active')">
        <a class="nav-link" href="{{ route('admin.log_histories.index') }}">
            <i class="fas fa-list"></i>
            <span>Log History</span></a>
    </li>

    <li class="nav-item @yield('finance-active')">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#coins" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-coins"></i>
            <span>Finance</span>
        </a>
        <div id="coins" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <a class="collapse-item @yield('qcategory-active')"
                    href="{{ route('admin.question_categories.index') }}">Question Categories</a> --}}
                <a class="collapse-item @yield('income-active')" href="{{ route('admin.incomes.index') }}">Incomes</a>

                <a class="collapse-item @yield('income-source-active')" href="{{ route('admin.income_sources.index') }}">Income
                    Sources</a>

                <a class="collapse-item @yield('expend-active')" href="{{ route('admin.expends.index') }}">Expenses</a>
            </div>
        </div>
    </li>

    <li class="nav-item @yield('setting-active')">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setting"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-cog"></i>
            <span>Configuration</span>
        </a>
        <div id="setting" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @yield('course-fee-active')" href="{{ route('admin.course_fees.index') }}">Course
                    Fee</a>
                <a class="collapse-item @yield('future-interest-active')" href="{{ route('admin.future_interests.index') }}">Future
                    Interest</a>
                <a class="collapse-item @yield('source-survey-active')" href="{{ route('admin.source_surveys.index') }}">Source
                    Survey</a>
                <a class="collapse-item @yield('state-active')"
                    href="{{ route('admin.states.index') }}">State/Division</a>

                <a class="collapse-item @yield('township-active')"
                    href="{{ route('admin.townships.index') }}">Cities/Townships</a>

                <a class="collapse-item @yield('nrc-info-active')" href="{{ route('admin.nrc_infos.index') }}">NRC</a>

                <a class="collapse-item @yield('medical_status-active')"
                    href="{{ route('admin.medical_statuses.index') }}">Medical
                    Status</a>
            </div>
        </div>
    </li>

    <li class="nav-item @yield('user-management-active')">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sm" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-users"></i>
            <span>User Management</span>
        </a>
        <div id="sm" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @yield('permission-active')"
                    href="{{ route('admin.permissions.index') }}">Permissions</a>

                <a class="collapse-item @yield('role-active')" href="{{ route('admin.roles.index') }}">Role</a>

                <a class="collapse-item @yield('user-active')" href="{{ route('admin.users.index') }}">User</a>
            </div>
        </div>
    </li>

    <li class="nav-item @yield('userguide-active')">
        <a class="nav-link" href="{{ route('admin.userguide') }}">
            <i class="fas fa-book"></i>
            <span>User Guide</span></a>
    </li>

</ul>
