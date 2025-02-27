<?php

namespace App\Http\Controllers\Admins;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Admins\Absent;
use App\Models\Admins\Student;
use App\Models\Admins\Classroom;
use App\Exports\ExportAbsentLists;
use App\Models\Admins\AcademicYear;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Admins\AttendanceList;
use App\Exports\ExportAttendanceLists;
use App\Models\Admins\AbsentClassroom;
use Illuminate\Support\Facades\Validator;

class AttendanceListController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
        //   $this->middleware('permission:teacher-leave-list|teacher-leave-create|teacher-leave-edit|teacher-leave-delete', ['only' => ['index','store']]);
        //   $this->middleware('permission:teacher-leave-create', ['only' => ['create','store']]);
        //   $this->middleware('permission:teacher-leave-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:student-absent-list', ['only' => ['absentList']]);
     }
    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $attendance_lists = AttendanceList::with('classroom','student','adminUser','academicYear')
                                ->where('date','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);

            $attendance_listsCount = AttendanceList::with('classroom','student','adminUser','academicYear')
                                ->where('date','LIKE',$search.'%')
                                ->latest('id')
                                ->get()
                                ->count();

        }else{
            $attendance_lists = AttendanceList::with('classroom','student','adminUser','academicYear')
                                ->latest('id')->paginate(10);

            $attendance_listsCount = AttendanceList::with('classroom','student','adminUser','academicYear')
                                ->latest('id')->get()->count();
        }
        return view('admins.attendance_lists.index',compact('attendance_lists','attendance_listsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = Classroom::get();
        $students = Student::get();
        $academic_years = AcademicYear::get();
        return view('admins.attendance_lists.create_absent',compact('classrooms','students','academic_years'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'student_id' => 'required',
            'academic_year_id' => 'required',
        ],
        [
            'student_id.required' => 'Student name required',
            'academic_year_id.required' => 'Academic Year required',
        ])->validate();

        $attendance_list = new AttendanceList;
        $attendance_list->date = $request->date;
        $attendance_list->student_id = $request->student_id;
        $attendance_list->academic_year_id = $request->academic_year_id;
        $attendance_list->remark = $request->remark;
        $attendance_list->admin_user_id = auth()->user()->id;
        $attendance_list->save();

        return redirect()->route('admin.attendance_lists.index')->with('success','Succeeded.');
    }

    public function absentCreate()
    {
        $classrooms = Classroom::get();
        $students = Student::get();
        $academic_years = AcademicYear::get();
        return view('admins.attendance_lists.create_absent',compact('classrooms','students','academic_years'));
    }

    public function absentList(Request $request)
    {
        $students = Student::get();
        $classrooms = Classroom::get();
        if($request->search){
            $search = $request->search;
            $absents = Absent::with('classroom')
                                ->where('date','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);

        }elseif($request->student_id){
            $student_id = $request->student_id;
            $classroom = Classroom::where('student_id',$student_id)->first();
            $absents = Absent::with('classroom')
                                ->where('classroom_id','LIKE',$classroom->id)
                                ->latest('id')
                                ->paginate(10);

        }elseif($request->from_date && $request->to_date){
            $from_date = Carbon::parse($request->from_date);
            $to_date = Carbon::parse($request->to_date);

            $absents = Absent::whereDate('date', '>=', $from_date)
                            ->whereDate('date', '<=', $to_date)
                            ->latest('id')
                            ->paginate(10);

            }else{
            $absents = Absent::with('classroom')
                                ->latest('id')->paginate(10);


        }


        return view('admins.attendance_lists.absent_list',compact('classrooms','absents','students'));
    }

    public function absentStore(Request $request)
    {
        // Validator::make($request->all(),[
        //     'classroom_id' => 'required',
        // ],
        // [
        //     'classroom_id.required' => 'Student name required',
        // ])->validate();

        $absent = new Absent;
        $absent->date = $request->date;
        // $absent->classroom_id = implode(',',$request->classroom_id);
        $absent->classroom_id = $request->classroom_id;
        $absent->student_id = $request->student_id;
        $absent->remark = $request->remark;
        $absent->admin_user_id = auth()->user()->id;
        $absent->save();

        // if($absent)
        //     {
        //     for($i=0;$i<count($request['classroom_id']);$i++)
        //         {
        //             $ac = new AbsentClassroom;
        //             $ac->absent_id = $absent->id;
        //             $ac->classroom_id = $request['classroom_id'][$i];
        //             $ac->save();
        //         }
        //     }

        return redirect()->route('admin.absents')->with('success','Succeeded.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attendance_list = AttendanceList::find($id);
        $students = Student::get();
        $academic_years = AcademicYear::get();
        return view('admins.attendance_lists.edit',compact('attendance_list','students','academic_years'));
    }

    public function absentEdit($id)
    {
        $absent = Absent::with('classroom')->find($id);
        $students = Student::get();
        $classrooms = Classroom::get();
        return view('admins.attendance_lists.edit_absent',compact('absent','students','classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attendance_list = AttendanceList::find($id);
        $attendance_list->date = $request->date;
        $attendance_list->student_id = $request->student_id;
        $attendance_list->academic_year_id = $request->academic_year_id;
        $attendance_list->remark = $request->remark;
        $attendance_list->admin_user_id = auth()->user()->id;
        $attendance_list->save();

        return redirect()->route('admin.attendance_lists.index')->with('success','Updated.');
    }

    public function absentUpdate(Request $request,$id)
    {
        $absent = Absent::find($id);
        $absent->date = $request->date;
        // $absent->classroom_id = implode(',',$request->classroom_id);
        $absent->classroom_id = $request->classroom_id;
        $absent->student_id = $request->student_id;
        $absent->remark = $request->remark;
        $absent->admin_user_id = auth()->user()->id;
        $absent->save();

        // if($absent)
        //     {
        //         if(isset($request['classroom_id']))
        //         {
        //             if(count($request['classroom_id']) > 0)
        //             {
        //                 for($i=0;$i<count($request['classroom_id']);$i++)
        //                 {
        //                     if(isset($request['absent_id'][$i]))
        //                     {
        //                         $additional['classroom_id'] = $request['classroom_id'][$i];
        //                         $update_additional = AbsentClassroom::where('id',$request['absent_id'][$i])
        //                                             ->update($additional);
        //                     }
        //                 }
        //             }
        //         }
        //     }

        return redirect()->route('admin.absents')->with('success','Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AttendanceList::where('id',$id)->delete();
        return back()->with('success','Deleted.');
    }

    public function absentDestroy(string $id)
    {
        Absent::where('id',$id)->delete();
        return back()->with('success','Deleted.');
    }

    public function export()
    {
        return Excel::download(new ExportAttendanceLists, 'attendance_lists.xlsx');
    }

    public function exportAbsent()
    {
        return Excel::download(new ExportAbsentLists, 'absent_lists.xlsx');
    }
}
