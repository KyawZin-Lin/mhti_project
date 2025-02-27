@extends('users.master')

@section('profile-active', 'active')

{{-- @section('reading-active', 'btn-info text-white') --}}

@section('content')
    <div class="container mt-5">

        <div class="row mt-5">
            <div class="col-sm-4 text-center">
                @if ($student->photo)
                    <img src="{{ asset('photos/students/photos/' . $student->photo) }}"
                        class="img-thumbnail shadow p-3 mb-5 bg-body rounded w-50" alt="">
                @else
                    <div class="text-danger shadow mb-5 bg-body rounded w-50 text-center"
                        style="height: 150px;line-height:150px;">
                        <b>No Photo</b>
                    </div>
                @endif

                <h5 class="text-info"><b>Exam Photo</b></h5>

                @if ($student->exam_photo)
                    <img src="{{ asset('photos/students/exam_photos/' . $student->exam_photo) }}"
                        class="img-thumbnail shadow p-3 mb-5 bg-body rounded w-50" alt="">
                @else
                    <div class="text-danger shadow mb-5 bg-body rounded w-50 text-center"
                        style="height: 150px;line-height:150px;">
                        <b>No Photo</b>
                    </div>
                @endif

                <h5 class="text-info"><b>Passport Photo</b></h5>

                @if ($student->passport_photo)
                    <img src="{{ asset('photos/students/passports/' . $student->passport_photo) }}"
                        class="img-thumbnail shadow p-3 mb-5 bg-body rounded w-50" alt="">
                @else
                    <div class="text-danger shadow mb-5 bg-body rounded w-50 text-center"
                        style="height: 150px;line-height:150px;">
                        <b>No Photo</b>
                    </div>
                @endif

            </div>

            <div class="col-sm-2">
                <h6>Name</h6>
                <h6>Email</h6>
                <h6>Phone</h6>
                <h6>Guardian Phone</h6>
                <h6>Student Category</h6>
                <h6>Experience</h6>
                <h6>Gender</h6>
                <h6>Date of Birth</h6>
                <h6>Father Name</h6>
                <h6>Mother Name</h6>
                <h6>Exam ID</h6>
                <h6>NRC</h6>
                <h6>State/Division</h6>
                <h6>City/Township</h6>
                <h6>Address</h6>
                <h6>Topik Level</h6>
                <h6>Remarks</h6>
                <h6>Medical Status</h6>
            </div>

            <div class="col-sm-6">
                <h6>: {{ $student->name }}</h6>
                <h6>: {{ $student->email }}</h6>
                <h6>: {{ $student->phone }}</h6>
                <h6>: {{ $student->mobile }}</h6>
                <h6>: {{ $student->student_category }}</h6>
                <h6>: {{ $student->exp }}</h6>
                <h6>: {{ $student->gender }}</h6>
                <h6>: {{ date('d-M-Y'), strtotime($student->gender) }}</h6>
                <h6>: {{ $student->father_name }}</h6>
                <h6>: {{ $student->mother_name }}</h6>
                <h6>: {{ $student->exam_id }}</h6>
                <h6>:
                    {{ $student->nrcInfo != null ? $student->nrcInfo->no . '/' . $student->nrcInfo->township_abbreviation : '' }}
                    {{ $student->nrc }}
                </h6>
                <h6>: {{ $student->state != null ? $student->state->name : '' }}</h6>
                <h6>: {{ $student->township != null ? $student->township->name : '' }}</h6>
                <h6>: {{ $student->address }}</h6>
                <h6>: {{ $student->topik_level }}</h6>
                <h6>: {{ $student->remarks }}</h6>
                <ul>
                    @foreach ($studentMedicalStatuses as $studentMedicalStatus)
                        <?php $medicalStatus = explode('_', $studentMedicalStatus->medical_status); ?>
                        <li>{{ $medicalStatus[0] }}
                            <span class="badge badge-success">
                                @if ($medicalStatus[1] == 1)
                                    {{ $medicalStatus[1] }} time
                                @else
                                    {{ $medicalStatus[1] }} times
                                @endif
                            </span>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
@endsection
