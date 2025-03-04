<?php

namespace App\Http\Controllers\Admins;

use Image;
use Carbon\Carbon;
use App\Models\User;
use App\Models\AdminUser;
use App\Models\Admins\Batch;
use App\Models\Admins\State;
use Illuminate\Http\Request;
use App\Models\Admins\Absent;
use App\Models\Admins\Course;
use App\Models\Admins\Degree;
use App\Models\Admins\Income;
use App\Models\Admins\NrcInfo;
use App\Models\Admins\Student;
use App\Models\Admins\Township;
use App\Models\Admins\Classroom;
use App\Models\Admins\PaymentType;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\Admins\AcademicYear;
use App\Models\Admins\IncomeDetail;
use App\Models\Admins\SourceSurvey;
use App\Models\Admins\StudentLimit;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Admins\MedicalStatus;
use Illuminate\Support\Facades\Hash;
use App\Models\Admins\FutureInterest;
use Illuminate\Support\Facades\Validator;
use App\Models\Admins\AnnouncementComment;
use App\Models\Admins\GenerateStudentCode;
use App\Models\Admins\StudentMedicalStatus;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:student-list|student-create|student-edit|student-delete', ['only' => ['index','store']]);
          $this->middleware('permission:student-create', ['only' => ['create','store']]);
          $this->middleware('permission:student-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:student-detail', ['only' => ['show']]);
          $this->middleware('permission:student-enrollment-detail', ['only' => ['studentEnrollmentDetail']]);
          $this->middleware('permission:student-delete', ['only' => ['destroy']]);
          $this->middleware('permission:enrollment-list', ['only' => ['enrollment']]);
     }

    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $students = Student::with('academicYear','course','adminUser','state','township')
                                ->where('name','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);


        }elseif($request->student_id){
            $studentId = $request->student_id;
            $students = Student::with('academicYear','course','adminUser','state','township')
                                ->where('student_no',$studentId)
                                ->latest('id')
                                ->paginate(10);
        }elseif($request->course_id){
            $courseId = $request->course_id;
            $students = Student::with('academicYear','course','adminUser','state','township')
                ->where('degree_id',$courseId)
                ->latest('id')
                ->paginate(10);
        }elseif($request->batch_id){
            $batchId = $request->batch_id;
            $students = Student::with('academicYear','course','adminUser','state','township')
                ->where('batch_id',$batchId)
                ->latest('id')
                ->paginate(10);
        }else{
        $students = Student::with('academicYear','course','adminUser','state','township')
                            ->latest('id')->paginate(10);

        }

        $limit = StudentLimit::first();
        $degrees = Degree::get();
        $batches = Batch::get();
        return view('admins.students.index',compact('students','limit','degrees','batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academic_years = AcademicYear::get();
        $courses = Course::get();
        $medical_statuses = MedicalStatus::get();
        $states = State::get();
        $townships = Township::get();
        $nrc_info_nos = NrcInfo::select('no')->distinct()->orderBy('no','DESC')->get();
        $nrc_infos = NrcInfo::orderBy('no','DESC')->get();
        $roles = Role::where('guard_name','student')->get();
        $degrees = Degree::get();
        $classrooms = Classroom::get();
        $payment_types = PaymentType::get();
        $batches = Batch::latest('id')->get();
        $future_interests = FutureInterest::get();
        $source_surveys = SourceSurvey::get();
        return view('admins.students.create',compact('academic_years','courses','medical_statuses','states','townships','nrc_infos','nrc_info_nos','roles','degrees','classrooms','payment_types','batches','future_interests','source_surveys'));
    }

    public function ajaxNrcAbbre(Request $request)
    {
        $nrc_no = $request->nrc_no;
        $nrc_infos = NrcInfo::where('no',$nrc_no)->orderBy('no','DESC')->get();

        // Log::info($nrc_no);

        return response()->json([
            'nrc_infos' => $nrc_infos,
        ]);
    }

    public function ajaxTownship(Request $request)
    {
        $state_id = $request->state_id;
        $townships = Township::where('state_id',$state_id)->get();

        // Log::info($nrc_no);

        return response()->json([
            'townships' => $townships,
        ]);
    }

    // public function generate_numbers($start, $count, $digits) {

	// 	for ($n = $start; $n < $start+$count; $n++) {

	// 		$result = str_pad($n, $digits, "0", STR_PAD_LEFT);

	// 	}
	// 	return $result;
	// }

    // public function generateStudentCode(Request $request)
    // {
    //     $course_id = $request->course_id;
    //     $course = Degree::where('id',$course_id)->first();

    //     if($course){
    //         $income_abbre = GenerateStudentCode::where('course_abbre','LIKE',$course->abbreviation)->latest('id')->first();

    //         $course_abbre = $course->abbreviation;

    //         if(isset($income_abbre->course_no)){
    //             $course_no = $income_abbre->course_no + 1;
    //         }else{
    //             $course_no = 401;
    //         }

    //         $student_no = $course->abbreviation.$this->generate_numbers((int)$course_no,1,5);
    //     }

    //     // $generateStudentCode = new GenerateStudentCode;
    //     // $generateStudentCode->course_id = $course_id;
    //     // if($course){
    //     //     $generateStudentCode->course_abbre = $course->abbreviation;
    //     //     if(isset($income_abbre->course_no)){
    //     //         $generateStudentCode->course_no = $income_abbre->course_no + 1;
    //     //     }else{
    //     //         $generateStudentCode->course_no = 401;
    //     //     }

    //     //     $generateStudentCode->student_no = $course->abbreviation.$this->generate_numbers((int)$generateStudentCode->course_no,1,5);
    //     // }

    //     // $generateStudentCode->save();

    //     return response()->json([
    //         'success' => 'Success',
    //         'student_no' => $student_no,
    //         'course_id' => $course_id,
    //         'course_abbre' => $course_abbre,
    //         'course_no' => $course_no
    //     ]);

    // }

    public function generateStudentCode(Request $request)
{
    $course_id = $request->course_id;
    $course = Degree::where('id', $course_id)->first();

    if ($course) {
        $course_abbre = $course->abbreviation;

        // Get all existing numbers for this course in ascending order
        $existing_numbers = GenerateStudentCode::where('course_abbre', $course_abbre)
            ->orderBy('course_no', 'asc')
            ->pluck('course_no')
            ->toArray();

        if (!empty($existing_numbers)) {
            // Find the first missing number in the sequence
            $course_no = $this->findNextAvailableNumber($existing_numbers);
        } else {
            $course_no = 401; // Start from 401 if no records exist
        }

        $student_no = $course_abbre . $this->generate_numbers((int) $course_no, 1, 5);

        return response()->json([
            'success' => 'Success',
            'student_no' => $student_no,
            'course_id' => $course_id,
            'course_abbre' => $course_abbre,
            'course_no' => $course_no
        ]);
    }

    return response()->json(['error' => 'Course not found'], 404);
}

// Helper function to find the next available number
private function findNextAvailableNumber($existing_numbers)
{
    $start = 401; // The first number in the sequence

    for ($i = 0; $i < count($existing_numbers); $i++) {
        if ($existing_numbers[$i] != $start) {
            return $start; // Found a missing number in sequence
        }
        $start++;
    }

    return $start; // If no gaps, return the next number in sequence
}

// Format number with leading zeros
public function generate_numbers($start, $count, $digits)
{
    return str_pad($start, $digits, "0", STR_PAD_LEFT);
}

    public function batchMessage(Request $request){
        $batchId = $request->batchId;
        $batch = Batch::where('id',$batchId)->first();

        $studentCount = Student::where('batch_id',$batchId)->count();
        // logger($studentCount);
        // logger($batch->student_qty);

        if((int)$studentCount > (int)$batch->student_qty)
        {
            return response()->json([
                'success' => 'Success',
                'message' => 'Quantity of Student is Full.',
            ]);
        }else{
            return response()->json([
                'success' => 'Success',
            ]);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd(request()->all());
        Validator::make($request->all(), [
            'name' => 'required',
            'student_no' => 'required',

            // 'email' => 'required|unique:users,email',
            // 'phone' => 'required',
            // 'password' => 'required|same:confirm_password',
        ])->validate();

        // $course = Degree::where('id',$request->degree_id)->first();

        // if($course){
        //     $income_abbre = Student::where('course_abbre','LIKE',$course->abbreviation)->latest('id')->first();
        // }
            $student = new Student;
            if($request->file("photo")) {
                $file=$request->file("photo");
                $filename = time().'_'.$file->getClientOriginalName();
                $path=public_path('photos/students/photos');
                $img = Image::make($file);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename);

                $student->photo = $filename;
            }

            if($request->file("applicant_sign")) {
                $file=$request->file("applicant_sign");
                $filename = time().'_'.$file->getClientOriginalName();
                $path=public_path('photos/students/applicant_signs');
                $img = Image::make($file);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename);

                $student->applicant_sign = $filename;
            }

            if($request->file("registered_sign")) {
                $file_registered_sign=$request->file("registered_sign");
                $filename_registered_sign = time().'_'.$file_registered_sign->getClientOriginalName();
                $path=public_path('photos/students/registered_signs');
                $img = Image::make($file_registered_sign);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename_registered_sign);

                $student->registered_sign = $filename_registered_sign;
            }

            //$student->student_id = $request->student_id;
            $student->date = $request->date;
            $student->start_date = $request->start_date;
            $student->end_date = $request->end_date;
            $student->name = $request->name;
            $student->student_category = $request->student_category;
            $student->degree_id = $request->degree_id;
            $student->classroom_id = $request->classroom_id;
            $student->batch_id = $request->batch_id;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->mobile = $request->mobile;
            $student->nrc = $request->nrc;
            $student->nrc_info_id = $request->nrc_info_id;
            $student->gender = $request->gender;
            $student->age = $request->age;
            $student->dob = $request->dob;
            $student->address = $request->address;
            $student->state_id = $request->state_id;
            $student->township_id = $request->township_id;
            $student->academic_year_id = $request->academic_year_id;
            $student->father_name = $request->father_name;
            $student->mother_name = $request->mother_name;
            $student->approve_by = auth()->user()->id;
            $student->approve_status = 1;
            $student->remarks = $request->remarks;
            $student->exp = $request->exp;
            $student->topik_level = $request->topik_level;
            $student->exam_id = $request->exam_id;
            $student->admin_user_id = auth()->user()->id;

            $student->course_registered = $request->course_registered;
            // if($course)
            // {
            //     $student->course_abbre = $course->abbreviation;
            //     if(isset($income_abbre->course_no)){
            //     $student->course_no = $income_abbre->course_no + 1;
            //     }else{
            //         $student->course_no = 401;
            //     }

            //     $student->student_no = $course->abbreviation.$this->generate_numbers((int)$student->course_no,1,5);
            // }
            $student->student_no = $request->student_no;
            $student->additional_course_id = $request->additional_course_id;
            $student->additional_student_no = $request->additional_student_no;
            $student->national_id = $request->national_id;
            $student->nationality = $request->nationality;
            $student->religion = $request->religion;
            $student->marital_status = $request->marital_status;
            $student->education = $request->education;
            $student->qualification = $request->qualification;
            $student->english_language = $request->english_language;
            $student->other_language = $request->other_language;
            $student->student_status = $request->student_status;
            $student->business_type = $request->business_type;
            $student->position = $request->position;
            $student->duties = $request->duties;
            $student->pay = $request->pay;
            $student->payment_complete = $request->payment_complete;
            $student->leaving = $request->leaving;
            $student->open_day = $request->open_day;
            $student->close_day = $request->close_day;
            $student->location = $request->location;
            if($request->future_interest){
                $student->future_interest = implode(',',$request->future_interest);
            }
            if($request->source_survey){
                $student->source_survey = implode(',',$request->source_survey);
            }
            $student->oversea = $request->oversea;
            $student->remark = $request->remark;
            $student->applicant = $request->applicant;
            $student->registered = $request->registered;
            $student->save();

            for($i=0;$i<count($request['course_id']);$i++)
            {
                $generateStudentCode = new GenerateStudentCode;
                $generateStudentCode->course_id = $request['course_id'][$i];

                $generateStudentCode->course_abbre = $request['course_abbre'][$i];
                $generateStudentCode->course_no = $request['course_no'][$i];
                $generateStudentCode->student_no = $request['course_abbre'][$i].$this->generate_numbers((int)$request['course_no'][$i],1,5);
                $generateStudentCode->save();
            }


            if($student){
                $student->student_id =  date("Y").date("m").$student->id;

                $student->update();

                $batch = Batch::where('id',$student->batch_id)->first();
                // if($batch->student_qty > $batch->enrolled_student)
                // {
                    if($batch){
                        if($batch->enrolled_student != null){
                            (int)$batch->enrolled_student += 1;
                        }else{
                            $batch->enrolled_student = 1;
                        }

                        $batch->save();
                    }

                //}


                // $user = new User;
                // $user->name = $request->name;
                // $user->email = $request->email;
                // $user->student_id = $student->id;
                // $user->status = 1;
                // $user->password = Hash::make($request->password);
                // $user->save();

                // $user->assignRole($request->input('roles'));


            }

            return redirect()->route('admin.students.index')
                ->with('success', 'Created.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::with('nrcInfo','state','township')->find($id);
        $studentMedicalStatuses = StudentMedicalStatus::where('student_id',$id)->get();
        $incomes = Income::where('student_id',$id)->latest('id')->get();
        $absents = Absent::with('classroom')->latest('id')->get();

        return view('admins.students.detail',compact('student','studentMedicalStatuses','absents','incomes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::with('nrcInfo','state','township')->find($id);

        $academic_years = AcademicYear::get();
        $courses = Course::get();
        $medical_statuses = MedicalStatus::get();
        $states = State::get();
        $townships = Township::get();
        $nrc_info_nos = NrcInfo::select('no')->distinct()->orderBy('no','DESC')->get();
        $nrc_infos = NrcInfo::orderBy('no','DESC')->get();
        $roles = Role::where('guard_name','student')->get();
        $studentMedicalStatuses = StudentMedicalStatus::where('student_id',$id)->get();
        $degrees = Degree::get();
        $classrooms = Classroom::get();
        $payment_types = PaymentType::get();
        $income = Income::where('student_id',$id)->first();
        $batches = Batch::latest('id')->get();
        $future_interests = FutureInterest::get();
        $source_surveys = SourceSurvey::get();
        return view('admins.students.edit',compact('student','academic_years','courses','medical_statuses','states','townships','nrc_infos','nrc_info_nos','roles','studentMedicalStatuses','degrees','classrooms','income','payment_types','batches','future_interests','source_surveys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validator::make($request->all(), [
        //     'name' => 'required',
        //     'email' => 'required',
        //     'phone' => 'required',
        // ])->validate();

            $stu = Student::where('id',$id)->first();

            //dd($request->student_no);

            if($stu->degree_id != $request->course_id)
            {
                // $stu->student_no == $request->student_no;
                // $stu->save();

                $generateStudentCode = new GenerateStudentCode;
                $generateStudentCode->course_id = $request->course_id;

                $generateStudentCode->course_abbre = $request->course_abbre;
                $generateStudentCode->course_no = $request->course_no;
                $generateStudentCode->student_no = $request->course_abbre.$this->generate_numbers((int)$request->course_no,1,5);
                $generateStudentCode->save();
            }

            $student = Student::find($id);

            if($student->photo != null && $request->photo){
                if(file_exists(public_path('photos/students/photos/'.$student->photo))){

                    unlink('photos/students/photos/'.$student->photo);

                }
            }


            if($student->applicant_sign != null && $request->applicant_sign){
                if(file_exists(public_path('photos/students/applicant_signs/'.$student->applicant_sign))){

                    unlink('photos/students/applicant_signs/'.$student->applicant_sign);

                }
            }

            if($student->registered_sign != null && $request->registered_sign){
                if(file_exists(public_path('photos/students/registered_signs/'.$student->registered_sign))){

                    unlink('photos/students/registered_signs/'.$student->registered_sign);

                }
            }

            if($request->file("photo")) {
                $file=$request->file("photo");
                $filename = time().'_'.$file->getClientOriginalName();
                $path=public_path('photos/students/photos');
                $img = Image::make($file);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename);

                $student->photo = $filename;
            }

            if($request->file("applicant_sign")) {
                $file=$request->file("applicant_sign");
                $filename = time().'_'.$file->getClientOriginalName();
                $path=public_path('photos/students/applicant_signs');
                $img = Image::make($file);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename);

                $student->applicant_sign = $filename;
            }

            if($request->file("registered_sign")) {
                $file_registered_sign=$request->file("registered_sign");
                $filename_registered_sign = time().'_'.$file_registered_sign->getClientOriginalName();
                $path=public_path('photos/students/registered_signs');
                $img = Image::make($file_registered_sign);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename_registered_sign);

                $student->registered_sign = $filename_registered_sign;
            }

            if(isset($generateStudentCode) && $request->course_id)
            {
                $student->student_no = $generateStudentCode->student_no;
            }else{
                $student->student_no = $stu->student_no;
            }

            $student->date = $request->date;
            $student->start_date = $request->start_date;
            $student->end_date = $request->end_date;
            $student->name = $request->name;
            $student->student_category = $request->student_category;
            $student->degree_id = $request->degree_id;
            $student->classroom_id = $request->classroom_id;
            $student->batch_id = $request->batch_id;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->mobile = $request->mobile;
            $student->nrc = $request->nrc;
            $student->nrc_info_id = $request->nrc_info_id;
            $student->gender = $request->gender;
            $student->age = $request->age;
            $student->dob = $request->dob;
            $student->address = $request->address;
            $student->state_id = $request->state_id;
            $student->township_id = $request->township_id;
            $student->academic_year_id = $request->academic_year_id;
            $student->father_name = $request->father_name;
            $student->mother_name = $request->mother_name;
            $student->approve_by = auth()->user()->id;
            $student->approve_status = 1;
            $student->remarks = $request->remarks;
            $student->exp = $request->exp;
            $student->topik_level = $request->topik_level;
            $student->exam_id = $request->exam_id;
            $student->admin_user_id = auth()->user()->id;

            $student->course_registered = $request->course_registered;
            //$student->vr_no = $request->vr_no;
            $student->national_id = $request->national_id;
            $student->nationality = $request->nationality;
            $student->religion = $request->religion;
            $student->marital_status = $request->marital_status;
            $student->education = $request->education;
            $student->qualification = $request->qualification;
            $student->english_language = $request->english_language;
            $student->other_language = $request->other_language;
            $student->student_status = $request->student_status;
            $student->business_type = $request->business_type;
            $student->position = $request->position;
            $student->duties = $request->duties;
            $student->pay = $request->pay;
            $student->payment_complete = $request->payment_complete;
            $student->leaving = $request->leaving;
            $student->open_day = $request->open_day;
            $student->close_day = $request->close_day;
            $student->location = $request->location;
            if($request->future_interest){
                $student->future_interest = implode(',',$request->future_interest);
            }
            if($request->source_survey){
                $student->source_survey = implode(',',$request->source_survey);
            }
            $student->oversea = $request->oversea;
            $student->remark = $request->remark;
            $student->applicant = $request->applicant;
            $student->registered = $request->registered;
            $student->save();

            return redirect()->route('admin.students.index')
                ->with('success', 'Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);

        if($student->photo != null){
            if(file_exists(public_path('photos/students/photos/'.$student->photo))){

                unlink('photos/students/photos/'.$student->photo);

            }
        }

        if($student->applicant_sign != null){
            if(file_exists(public_path('photos/students/applicant_signs/'.$student->applicant_sign))){

                unlink('photos/students/applicant_signs/'.$student->applicant_sign);

            }
        }

        if($student->registered_sign != null){
            if(file_exists(public_path('photos/students/registered_signs/'.$student->registered_sign))){

                unlink('photos/students/registered_signs/'.$student->registered_sign);

            }
        }

        if($student->exam_photo != null){
            if(file_exists(public_path('photos/students/exam_photos/'.$student->exam_photo))){

                unlink('photos/students/exam_photos/'.$student->exam_photo);

            }
        }

        if($student->passport_photo != null){
            if(file_exists(public_path('photos/students/passports/'.$student->passport_photo))){

                unlink('photos/students/passports/'.$student->passport_photo);

            }
        }

        if($student->nrc_front != null){
            if(file_exists(public_path('photos/students/nrc_fronts/'.$student->nrc_front))){

                unlink('photos/students/nrc_fronts/'.$student->nrc_front);

            }
        }

        if($student->nrc_back != null){
            if(file_exists(public_path('photos/students/nrc_backs/'.$student->nrc_back))){

                unlink('photos/students/nrc_backs/'.$student->nrc_back);

            }
        }

        // dd(GenerateStudentCode::where('student_no',$student->student_no)->first());

        GenerateStudentCode::where('student_no',$student->student_no)->delete();
        $student->delete();

        User::where('student_id',$id)->delete();
        AnnouncementComment::where('student_id',$id)->delete();
        Classroom::where('student_id',$id)->delete();

        Income::where('student_id',$id)->delete();

        IncomeDetail::where('student_id',$id)->delete();

        return back()->with('success','Deleted.');
    }

    public function increaseLimit($id)
    {
        $student_limit = StudentLimit::find($id);
        return view('admins.students.increase_student_limit',compact('student_limit'));
    }

    public function increaseLimitAdd(Request $request,$id)
    {
        $student = StudentLimit::find($id);
        $student->limit_student = $request->limit_student;
        $student->admin_user_id = auth()->user()->id;
        $student->save();

        return back()->with('success','Limit Increase Successfully.');
    }

    public function card($id){
        $student = Student::where('id',$id)->first();
        $qrCodes= QrCode::size(120)->generate($student->course_registered . '/' .$student->name . '/' . $student->student_id.'/' .$student->national_id);
        return view('admins.students.card',compact('student','qrCodes'));
    }

    public function activeStudent(Request $request)
    {
        $today = Carbon::today();

        if($request->course_id){
            $courseId = $request->course_id;
            $students = Student::with('academicYear','course','adminUser','state','township')
                            ->whereDate('start_date', '<=', $today)
                            ->whereDate('end_date','>=',$today)
                            ->where('degree_id',$courseId)
                            ->latest('id')
                            ->paginate(10);
        }else{
            $students = Student::whereDate('start_date', '<=', $today)
                            ->whereDate('end_date','>=',$today)
                            ->latest('id')
                            ->paginate(10);
        }

        $degrees = Degree::get();

        return view('admins.students.active_student',compact('students','degrees'));

    }

    public function alumnus(Request $request)
    {
        $today = Carbon::today();

        if($request->course_id){
            $courseId = $request->course_id;
            $students = Student::with('academicYear','course','adminUser','state','township')
                            ->whereDate('end_date','<',$today)
                            ->where('degree_id',$courseId)
                            ->latest('id')
                            ->paginate(10);
        }else{
            $students = Student::whereDate('end_date','<',$today)
                            ->latest('id')
                            ->paginate(10);
        }

        $degrees = Degree::get();

        return view('admins.students.alumnus',compact('students','degrees'));

    }

    public function oversea(Request $request)
    {
        if($request->course_id){
            $courseId = $request->course_id;
            $students = Student::with('academicYear','course','adminUser','state','township')
                            ->where('oversea','Oversea')
                            ->where('degree_id',$courseId)
                            ->latest('id')
                            ->paginate(10);
        }else{
            $students = Student::where('oversea','Oversea')
                            ->latest('id')
                            ->paginate(10);
        }

        $degrees = Degree::get();

        return view('admins.students.oversea',compact('students','degrees'));

    }

    public function paymentByInstallmentPage($id)
    {
        $student = Student::find($id);
        $payment_types = PaymentType::get();
        return view('admins.students.payment_by_installment',compact('student','payment_types'));
    }

    public function paymentByInstallment($id,Request $request)
    {
        $student = Student::find($id);
        $student->payment_complete = $request->payment_complete;
        $student->save();

        if($student){

            $income = new Income;
            $income->date = $request->payment_date;
            $income->title = $request->title;
            $income->payment_type = $request->payment_type;
            $income->payment_installment = $request->payment_installment;
            $income->payment_complete = $request->payment_complete;
            $income->student_id = $student->id;
            $income->income_source_id = $request->income_source_id;
            $income->particular = $request->particular;
            $income->group = $request->group;
            $income->amount = $request->pay_money;
            $income->left_money = $request->left_money;
            $income->remark = $request->remark;
            $income->admin_user_id = auth()->user()->id;
            $income->save();
        }

        return redirect()->route('admin.students.index')
                ->with('success', 'Updated.');
    }

    public function completePaymentStudent(Request $request)
    {
        $today = Carbon::today();

        if($request->course_id){
            $courseId = $request->course_id;
            $students = Student::with('academicYear','course','adminUser','state','township')
                            ->whereDate('start_date', '<=', $today)
                            ->whereDate('end_date','>=',$today)
                            ->where('degree_id',$courseId)
                            ->where('payment_complete','Like','Complete')
                            ->latest('id')
                            ->paginate(10);
        }else{
            $students = Student::whereDate('start_date', '<=', $today)
                            ->whereDate('end_date','>=',$today)
                            ->where('payment_complete','Like','Complete')
                            ->latest('id')
                            ->paginate(10);
        }

        $degrees = Degree::get();

        return view('admins.students.complete_payment',compact('students','degrees'));

    }

    public function incompletePaymentStudent(Request $request)
    {
        $today = Carbon::today();

        if($request->course_id){
            $courseId = $request->course_id;
            $students = Student::with('academicYear','course','adminUser','state','township')
                            ->whereDate('start_date', '<=', $today)
                            ->whereDate('end_date','>=',$today)
                            ->where('degree_id',$courseId)
                            ->where('payment_complete','Like','InComplete')
                            ->latest('id')
                            ->paginate(10);
        }else{
            $students = Student::whereDate('start_date', '<=', $today)
                            ->whereDate('end_date','>=',$today)
                            ->where('payment_complete','Like','InComplete')
                            ->latest('id')
                            ->paginate(10);
        }

        $degrees = Degree::get();

        return view('admins.students.incomplete_payment',compact('students','degrees'));

    }

    public function enrollment(Request $request){
        if($request->search){
            $search = $request->search;
            $batches = Batch::where('batch','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);
        }else{
        $batches = Batch::latest('id')->paginate(10);
    }

        $students = Student::get();

        $countings = DB::table('students')
            ->join('batches', 'students.batch_id', '=', 'batches.id')
            ->select(DB::raw('count(*) as count'), 'students.batch_id as batch_id')
            ->groupBy('batch_id')
            ->get();

        $studentBatches = Student::select('batch_id')->get();

        // foreach($studentBatches as $student)
        // {
        //     $batchQty[] = $student->batch_id;
        // }

        // $count = Batch::whereIn('id',$batchQty)->get();

        return view('admins.students.enrollment',compact('batches','students','countings'));
    }

    public function studentEnrollment($batch_id){
        $students = Student::where('batch_id',$batch_id)->latest('id')->paginate(10);
        return view('admins.students.student_enrollment_list',compact('students'));
    }

    public function studentEnrollmentDetail($id)
    {
        $student = Student::with('nrcInfo','state','township')->find($id);
        $studentMedicalStatuses = StudentMedicalStatus::where('student_id',$id)->get();
        $incomes = Income::where('student_id',$id)->latest('id')->get();
        $absents = Absent::with('classroom')->latest('id')->get();
        return view('admins.students.student_enrollment_detail',compact('student','studentMedicalStatuses','absents','incomes'));
    }

}
