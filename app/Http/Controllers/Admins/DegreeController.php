<?php

namespace App\Http\Controllers\Admins;

use App\Models\Admins\Batch;
use Illuminate\Http\Request;
use App\Models\Admins\Degree;
use App\Models\Admins\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:course-list|course-create|course-edit|course-delete', ['only' => ['index','store']]);
          $this->middleware('permission:course-create', ['only' => ['create','store']]);
          $this->middleware('permission:course-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:course-detail', ['only' => ['show']]);
          $this->middleware('permission:course-grid-view', ['only' => ['batchDetail']]);
          $this->middleware('permission:course-delete', ['only' => ['destroy']]);
     }


    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $degrees = Degree::where('name','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);

            $degrees_count = Degree::where('name','LIKE',$search.'%')
                                ->latest('id')
                                ->count();

        }else{
            $degrees = Degree::latest('id')->paginate(10);

            $degrees_count = Degree::latest('id')->count();
        }

        return view('admins.degrees.index',compact('degrees','degrees_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.degrees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required',
        ])->validate();

        $degree = new Degree;
        $degree->name = $request->name;
        $degree->abbreviation = $request->abbreviation;
        $degree->save();

        return redirect()->route('admin.degrees.index')->with('success','Succeeded.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id,Request $request)
    {
        $degree = Degree::find($id);
        $batches = Batch::get();

        if($request->search){
            $students = Student::where('name','LIKE',$request->search.'%')
                            ->orwhere('phone','LIKE',$request->search.'%')
                            ->where('degree_id',$id)
                            ->latest('id')
                            ->paginate(10);
        }else{
            $students = Student::where('degree_id',$id)
                            ->latest('id')
                            ->paginate(10);
        }

        return view('admins.degrees.detail',compact('degree','students','batches'));
    }

    public function studentDetail($id){
        $student = Student::where('id',$id)->first();

        return view('admins.degrees.student_detail',compact('student'));
    }

    public function batchDetail(string $id)
    {
        $degree = Degree::find($id);
        if(request()->year)
        {
            $years = Batch::where('academic_year_id','LIKE',request('year'))
                            ->where('degree_id',$degree->abbreviation)
                            ->latest('id')->get();
        }else{
            $years = Batch::where('degree_id',$degree->abbreviation)->latest('id')->get();
        }

        return view('admins.degrees.batch_detail',compact('degree','years'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $degree = Degree::find($id);

        return view('admins.degrees.edit',compact('degree'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(),[
            'name' => 'required',
        ])->validate();

        $degree = Degree::find($id);
        $degree->name = $request->name;
        $degree->abbreviation = $request->abbreviation;
        $degree->save();

        return redirect()->route('admin.degrees.index')->with('success','Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Degree::where('id',$id)->delete();
        return back()->with('success','Deleted.');
    }
}
