<div class="row mt-3">
    <div class="col-sm-12">
        <a href="{{ route('user.examReadingType1') }}" class="text-decoration-none">
            <button type="button" class="btn btn-sm btn-outline-info @yield('reading-active')">Question
                (Reading)</button>
        </a>

        <a href="{{ route('user.examListeningType1') }}" class="text-decoration-none">
            <button type="button" class="btn btn-sm btn-outline-info @yield('listening-active')">Question
                (Listening)</button>
        </a>
    </div>
</div>
