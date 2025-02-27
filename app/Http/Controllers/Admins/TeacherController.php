<?php

namespace App\Http\Controllers\Admins;

use Carbon\Carbon;
use App\Models\Admins\Batch;
use App\Models\Admins\State;
use Illuminate\Http\Request;
use App\Models\Admins\Degree;
use App\Models\Admins\Expend;
use App\Models\Admins\Income;
use App\Models\Admins\NrcInfo;
use App\Models\Admins\Teacher;
use App\Models\Admins\Township;
use App\Models\Admins\StaffLeave;
use App\Models\Admins\PaymentType;
use App\Models\Admins\TeacherLimit;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\Admins\TeacherAttendance;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:teacher-list|teacher-create|teacher-edit|teacher-delete', ['only' => ['index','store']]);
          $this->middleware('permission:teacher-create', ['only' => ['create','store']]);
          $this->middleware('permission:teacher-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:teacher-detail', ['only' => ['gridView']]);
          $this->middleware('permission:teacher-enrollment-detail', ['only' => ['teacherEnrollmentDetail']]);
          $this->middleware('permission:teacher-delete', ['only' => ['destroy']]);
     }


    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $teachers = Teacher::where('name','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);

            $teachers_count = Teacher::where('name','LIKE',$search.'%')
                                ->get()
                                ->count();
        }else{
            $teachers = Teacher::latest('id')->paginate(10);

            $teachers_count = Teacher::latest('id')->get()->count();
        }

        $limit = TeacherLimit::first();

        return view('admins.teachers.index',compact('teachers','teachers_count','limit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::get();
        $townships = Township::get();
        $nrc_info_nos = NrcInfo::select('no')->distinct()->orderBy('no','DESC')->get();
        $nrc_infos = NrcInfo::orderBy('no','ASC')->get();
        $payment_types = PaymentType::get();
        $courses = Degree::get();
        $batches = Batch::get();
        return view('admins.teachers.create',compact('states','townships','nrc_infos','nrc_info_nos','payment_types','courses','batches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
        ])->validate();

            $teacher = new Teacher;
            if($request->file("photo")) {
                $file=$request->file("photo");
                $filename = time().'_'.$file->getClientOriginalName();
                $path=public_path('photos/teachers/photos');
                $img = Image::make($file);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename);

                $teacher->photo = $filename;
            }


            $teacher->name = $request->name;
            $teacher->email = $request->email;
            $teacher->phone = $request->phone;
            $teacher->nrc = $request->nrc;
            $teacher->nrc_info_id = $request->nrc_info_id;
            $teacher->gender = $request->gender;
            $teacher->position = $request->position;
            $teacher->course_id = $request->course_id;
            $teacher->batch_id = $request->batch_id;
            $teacher->degree = $request->degree;
            $teacher->dob = $request->dob;
            $teacher->address = $request->address;
            $teacher->state_id = $request->state_id;
            $teacher->township_id = $request->township_id;
            $teacher->approve_by = auth()->user()->id;
            $teacher->approve_status = 1;
            $teacher->degree_id = $request->degree_id;
            $teacher->remarks = $request->remarks;
            $teacher->duty_assign = $request->duty_assign;
            $teacher->topik_level = $request->topik_level;
            $teacher->standard_salary = $request->standard_salary;
            $teacher->admin_user_id = auth()->user()->id;
            $teacher->save();

            if($teacher){
                $expend = new Expend;
                $expend->teacher_id = $teacher->id;
                $expend->date = $request->salary_date;
                $expend->amount = $request->salary;
                $expend->payment_type_id = $request->payment_type_id;
                $expend->save();
            }

            return redirect()->route('admin.teachers.index')
                ->with('success', 'Created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::with('nrcInfo','state','township')->find($id);
        $expenses = Expend::where('teacher_id',$teacher->id)->latest('id')->paginate(10);
        $teacher_attendances = TeacherAttendance::where('teacher_id',$teacher->id)->latest('id')->paginate(10);
        $staff_leaves = StaffLeave::where('teacher_id',$teacher->id)->latest('id')->paginate(10);
        return view('admins.teachers.detail',compact('teacher','expenses','teacher_attendances','staff_leaves'));
    }

    public function gridView($id,$month)
    {
        // $teacher_attendances = TeacherAttendance::where('teacher_id',$id)->latest('id')->paginate(10);
        // $staff_leaves = StaffLeave::where('teacher_id',$id)->latest('id')->paginate(10);
        // return view('admins.teachers.grid_view',compact('teacher_attendances','staff_leaves','id'));

        // $jan_teachers = TeacherAttendance::whereMonth('teacher_attendances.date',1)
        //                                 ->orwhereMonth('staff_leaves.date',1)
        //                                 ->join('staff_leaves','teacher_attendances.teacher_id','staff_leaves.id')

        //                                 ->select('teacher_attendances.date as attendance_date','staff_leaves.date as leave_date')
        //                                 ->get();

        // $id = $request->id;
        // $month = $request->month;

        // logger($id);
        // logger($month);

        $teacher = Teacher::with('nrcInfo','state','township')->find($id);
        $expenses = Expend::where('teacher_id',$id)->latest('id')->paginate(10);

        $jan_attendances = TeacherAttendance::whereMonth('teacher_attendances.date',$month)
                                                ->where('teacher_id',$id)
                                                ->select('teacher_attendances.date as attendance_date')
                                                ->get();

                                                // logger($jan_attendances);

        $jan_leaves = StaffLeave::whereMonth('staff_leaves.date',$month)
                                                ->where('teacher_id',$id)
                                                ->select('staff_leaves.date as leave_date')
                                                ->get();

        $days = Carbon::now()->month($month)->daysInMonth;

        $year = Carbon::now()->format('Y');

        // $weekend = Carbon::now()->isWeekend();

        // dd($weekend);

        // return response()->json([
        //     'jan_attendances' => $jan_attendances,
        //     'jan_leaves' => $jan_leaves,
        //     'days' => $days,
        //     'id' => $id,
        //     'month' => $month,
        //     'year' => $year,
        // ]);


        return view('admins.teachers.grid_view',compact('teacher','expenses','jan_attendances','jan_leaves','days','id','month','year'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $states = State::get();
        $townships = Township::get();
        $nrc_info_nos = NrcInfo::select('no')->distinct()->orderBy('no','DESC')->get();
        $nrc_infos = NrcInfo::orderBy('no','ASC')->get();
        $teacher = Teacher::find($id);
        $expense = Expend::where('teacher_id',$id)->first();
        $payment_types = PaymentType::get();
        $courses = Degree::get();
        $batches = Batch::get();
        return view('admins.teachers.edit',compact('states','townships','nrc_infos','nrc_info_nos','teacher','expense','payment_types','courses','batches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $teacher = Teacher::find($id);

            if($teacher->photo != null && $request->photo){
                if(file_exists(public_path('photos/teachers/photos/'.$teacher->photo))){

                    unlink('photos/teachers/photos/'.$teacher->photo);

                }
            }

            if($request->file("photo")) {
                $file=$request->file("photo");
                $filename = time().'_'.$file->getClientOriginalName();
                $path=public_path('photos/teachers/photos');
                $img = Image::make($file);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename);

                $teacher->photo = $filename;
            }


            $teacher->name = $request->name;
            $teacher->email = $request->email;
            $teacher->phone = $request->phone;
            $teacher->nrc = $request->nrc;
            $teacher->nrc_info_id = $request->nrc_info_id;
            $teacher->gender = $request->gender;
            $teacher->position = $request->position;
            $teacher->course_id = $request->course_id;
            $teacher->batch_id = $request->batch_id;
            $teacher->degree = $request->degree;
            $teacher->dob = $request->dob;
            $teacher->address = $request->address;
            $teacher->state_id = $request->state_id;
            $teacher->township_id = $request->township_id;
            $teacher->approve_by = auth()->user()->id;
            $teacher->approve_status = 1;
            $teacher->degree_id = $request->degree_id;
            $teacher->remarks = $request->remarks;
            $teacher->duty_assign = $request->duty_assign;
            $teacher->topik_level = $request->topik_level;
            $teacher->standard_salary = $request->standard_salary;
            $teacher->admin_user_id = auth()->user()->id;
            $teacher->save();

            if($teacher){
                $expend = Expend::where('teacher_id',$id)->first();
                if(isset($expend->teacher_id)){
                    $expend->teacher_id = $teacher->id;
                    $expend->date = $request->salary_date;
                    $expend->amount = $request->salary;
                    $expend->payment_type_id = $request->payment_type_id;
                    $expend->save();
                }else{
                    $expend = new Expend;
                    $expend->teacher_id = $teacher->id;
                    $expend->date = $request->salary_date;
                    $expend->amount = $request->salary;
                    $expend->payment_type_id = $request->payment_type_id;
                    $expend->save();
                }

            }

            return redirect()->route('admin.teachers.index')
                ->with('success', 'Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::find($id);

        if($teacher->photo != null){
            if(file_exists(public_path('photos/teachers/photos/'.$teacher->photo))){

                unlink('photos/teachers/photos/'.$teacher->photo);

            }
        }

        $teacher->delete();
        Expend::where('teacher_id',$id)->delete();
        StaffLeave::where('teacher_id',$id)->delete();
        return back()->with('success','Deleted.');
    }

    public function increaseLimit($id)
    {
        $teacher_limit = TeacherLimit::find($id);
        return view('admins.teachers.increase_teacher_limit',compact('teacher_limit'));
    }

    public function increaseLimitAdd(Request $request,$id)
    {
        $teacher = TeacherLimit::find($id);
        $teacher->limit_teacher = $request->limit_teacher;
        $teacher->admin_user_id = auth()->user()->id;
        $teacher->save();

        return back()->with('success','Limit Increase Successfully.');
    }

    public function teacherEnrollment($batch_id){
        $teachers = Teacher::where('batch_id',$batch_id)->latest('id')->paginate(10);
        return view('admins.teachers.teacher_enrollment_list',compact('teachers'));
    }

    public function teacherEnrollmentDetail($id){
        $teacher = Teacher::with('nrcInfo','state','township')->find($id);
        $expenses = Expend::where('teacher_id',$teacher->id)->latest('id')->paginate(10);
        return view('admins.teachers.teacher_enrollment_detail',compact('teacher','expenses'));
    }

    public function teacherPaymentAutoDelete($id){
        Expend::where('teacher_id',$id)
                ->where('date', '<', Carbon::now()->subDays(7))
                ->delete();

        return back()->with('success','Auto Delete Successfully.');
    }
}
