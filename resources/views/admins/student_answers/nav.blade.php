<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('admin.student_answers.index') }}" class="text-decoration-none">
            <button type="button" class="btn btn-sm btn-outline-primary @yield('reading-active')">Answer
                (Reading)</button>
        </a>

        <a href="{{ route('admin.student_answers_listenings.index') }}" class="text-decoration-none">
            <button type="button" class="btn btn-sm btn-outline-primary @yield('listening-active')">Answer
                (Listening)</button>
        </a>
    </div>
</div>
