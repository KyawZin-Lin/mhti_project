<a href="{{ route('admin.rooms.index') }}"><button type="button"
        class="btn btn-md btn-info mr-1 @yield('room-active')">Room</button></a>

<a href="{{ route('admin.floors.index') }}"><button type="button"
        class="btn btn-md btn-info mr-1 @yield('floor-active')">Floor</button></a>

<a href="{{ route('admin.buildings.index') }}"><button type="button"
        class="btn btn-md btn-info mr-1 @yield('building-active')">Building</button></a>

{{-- <a href="{{ route('admin.branches.index') }}"><button type="button"
        class="btn btn-md btn-info mr-1 @yield('branch-active')">Branch</button></a> --}}
