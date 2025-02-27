<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Models\Admins\Course;
use App\Models\Admins\AcademicYear;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  function __construct()
    //  {
    //       $this->middleware('permission:course-list|course-create|course-edit|course-delete', ['only' => ['index','store']]);
    //       $this->middleware('permission:course-create', ['only' => ['create','store']]);
    //       $this->middleware('permission:course-edit', ['only' => ['edit','update']]);
    //       $this->middleware('permission:course-delete', ['only' => ['destroy']]);
    //  }

    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $courses = Course::with('academicYear','adminUser')
                                ->where('name','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);
        }else{
            $courses = Course::with('academicYear','adminUser')
                                ->latest('id')->paginate(10);
        }

        return view('admins.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academic_years = AcademicYear::get();
        return view('admins.courses.create',compact('academic_years'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required',
            "audio_file" => 'mimes:mp3,m4a',
        ])->validate();

        $course = new Course;

        if($request->hasFile('audio_file'))
        {
            $audio_file = $request->file("audio_file");
            $audio_file_name = time().'_'.$audio_file->getClientOriginalName();
            $audio_file->move(public_path().'/audios/courses',$audio_file_name);

            $course->audio_file = $audio_file_name;
        }
        $course->name = $request->name;
        $course->abbreviation = $request->abbreviation;
        $course->academic_year_id = $request->academic_year_id;
        $course->remarks = $request->remarks;
        $course->admin_user_id = $request->admin_user_id;
        $course->save();

        return redirect()->route('admin.courses.index')->with('success','Succeeded.');
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
        $course = Course::find($id);
        $academic_years = AcademicYear::get();
        return view('admins.courses.edit',compact('course','academic_years'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        Validator::make($request->all(),[
            'name' => 'required',
            "audio_file" => 'mimes:mp3,m4a',
        ])->validate();

        $course = Course::find($id);

        if($course->audio_file != null && $request->audio_file){
            if(file_exists(public_path('audios/courses/'.$course->audio_file))){

                unlink('audios/courses/'.$course->audio_file);

            }
        }

        if($request->hasFile('audio_file'))
        {
            $audio_file = $request->file("audio_file");
            $audio_file_name = time().'_'.$audio_file->getClientOriginalName();
            $audio_file->move(public_path().'/audios/courses',$audio_file_name);

            $course->audio_file = $audio_file_name;
        }
        $course->name = $request->name;
        $course->abbreviation = $request->abbreviation;
        $course->academic_year_id = $request->academic_year_id;
        $course->remarks = $request->remarks;
        $course->admin_user_id = $request->admin_user_id;
        $course->save();

        return redirect()->route('admin.courses.index')->with('success','Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);

        if($course->audio_file != null){
            if(file_exists(public_path('audios/courses/'.$course->audio_file))){

                unlink('audios/courses/'.$course->audio_file);

            }
        }

        $course->delete();
        return back()->with('success','Deleted.');
    }
}
