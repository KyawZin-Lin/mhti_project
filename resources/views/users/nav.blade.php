<nav class="navbar navbar-expand-lg navbar-dark bg-color fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li> --}}
                <li class="nav-item @yield('announcement-active')">
                    <a class="nav-link" href="{{ route('user.announcements') }}">Announcement</a>
                </li>

                <li class="nav-item @yield('forum-active')">
                    <a class="nav-link" href="{{ route('user.forum.index') }}">Forum</a>
                </li>

                <li class="nav-item @yield('exam-active')">
                    <a class="nav-link" href="{{ route('user.examReadingType1') }}">Exam</a>
                </li>

                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-none d-lg-inline text-white small">{{ auth()->user()->name }}</span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('user.profile') }}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        {{-- <div class="dropdown-divider"></div> --}}

                        <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                            <form method="POST" action="{{ route('user.logout') }}">
                                @csrf

                                <button type="submit" class="btn btn-default p-0"><i
                                        class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-dark"></i>
                                    Logout</button>
                            </form>
                        </a>


                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
