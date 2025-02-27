<?php

namespace App\Http\Controllers\Admins;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Admins\Teacher;
use App\Http\Controllers\Controller;
use App\Models\Admins\TeacherAttendance;

class TeacherAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:teacher-attendance-list|teacher-attendance-create|teacher-attendance-edit|teacher-attendance-delete', ['only' => ['index','store']]);
          $this->middleware('permission:teacher-attendance-create', ['only' => ['create','store']]);
          $this->middleware('permission:teacher-attendance-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:teacher-attendance-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        if($request->date){
            $date =  Carbon::parse($request->date);
            $teacher_attendances = TeacherAttendance::whereDate('date',$date)->paginate(10);
        }elseif($request->month){
            $month =  Carbon::parse($request->month);
            $teacher_attendances = TeacherAttendance::whereMonth('date',$month)->paginate(10);
        }elseif($request->from_date && $request->to_date){

            $from_date = Carbon::parse($request->from_date);
            $to_date = Carbon::parse($request->to_date);

            $teacher_attendances = TeacherAttendance::whereDate('date', '>=', $from_date)
                            ->whereDate('date', '<=', $to_date)
                            ->latest('id')
                            ->paginate(10);
        }else{
            $teacher_attendances = TeacherAttendance::latest('id')->paginate(10);
        }


        return view('admins.teacher_attendances.index',compact('teacher_attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::latest('id')->get();
        return view('admins.teacher_attendances.create',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teacher_attendance = new TeacherAttendance;
        $teacher_attendance->date = $request->date;
        $teacher_attendance->teacher_id = $request->teacher_id;
        $teacher_attendance->note = $request->note;
        $teacher_attendance->admin_user_id = $request->admin_user_id;
        $teacher_attendance->save();
        return redirect()->route('admin.teacher_attendances.index')->with('success','Created Successfully.');
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
        $teacher_attendance = TeacherAttendance::find($id);
        $teachers = Teacher::latest('id')->get();
        return view('admins.teacher_attendances.edit',compact('teacher_attendance','teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teacher_attendance = TeacherAttendance::find($id);
        $teacher_attendance->date = $request->date;
        $teacher_attendance->teacher_id = $request->teacher_id;
        $teacher_attendance->note = $request->note;
        $teacher_attendance->admin_user_id = $request->admin_user_id;
        $teacher_attendance->save();
        return redirect()->route('admin.teacher_attendances.index')->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TeacherAttendance::where('id',$id)->delete();
        return back()->with('success','Deleted Successfully.');
    }
}
