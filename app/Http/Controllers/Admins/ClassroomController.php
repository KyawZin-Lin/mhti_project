<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Models\Admins\Student;
use App\Models\Admins\Classroom;
use App\Models\Admins\AcademicYear;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:class-list|class-create|class-edit|class-delete', ['only' => ['index','store']]);
          $this->middleware('permission:class-create', ['only' => ['create','store']]);
          $this->middleware('permission:class-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:class-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $classrooms = Classroom::with('student','adminUser','academicYear')
                                ->where('batch','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);

            $classroomsCount = Classroom::with('student','adminUser','academicYear')
                                ->where('batch','LIKE',$search.'%')
                                ->latest('id')
                                ->get()
                                ->count();

        }else{
            $classrooms = Classroom::with('student','adminUser','academicYear')
                                ->latest('id')->paginate(10);

            $classroomsCount = Classroom::with('student','adminUser','academicYear')
                                ->latest('id')->get()->count();
        }
        return view('admins.classrooms.index',compact('classrooms','classroomsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::get();
        $academic_years = AcademicYear::get();
        return view('admins.classrooms.create',compact('students','academic_years'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validator::make($request->all(),[
        //     'student_id' => 'required',
        //     'academic_year_id' => 'required',
        // ],
        // [
        //     'student_id.required' => 'Student name required',
        //     'academic_year_id.required' => 'Academic Year required',
        // ])->validate();

        $classroom = new Classroom;
        $classroom->batch = $request->batch;
        $classroom->student_id = $request->student_id;
        $classroom->academic_year_id = $request->academic_year_id;
        $classroom->admin_user_id = auth()->user()->id;
        $classroom->save();

        return redirect()->route('admin.classrooms.index')->with('success','Succeeded.');
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
        $classroom = Classroom::find($id);
        $students = Student::get();
        $academic_years = AcademicYear::get();
        return view('admins.classrooms.edit',compact('classroom','students','academic_years'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validator::make($request->all(),[
        //     'student_id' => 'required',
        //     'academic_year_id' => 'required',
        // ],
        // [
        //     'student_id.required' => 'Student name required',
        //     'academic_year_id.required' => 'Academic Year required',
        // ])->validate();

        $classroom = Classroom::find($id);
        $classroom->batch = $request->batch;
        $classroom->student_id = $request->student_id;
        $classroom->academic_year_id = $request->academic_year_id;
        $classroom->admin_user_id = auth()->user()->id;
        $classroom->save();

        return redirect()->route('admin.classrooms.index')->with('success','Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Classroom::where('id',$id)->delete();
        return back()->with('success','Deleted.');
    }
}
