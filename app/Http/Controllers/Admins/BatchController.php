<?php

namespace App\Http\Controllers\Admins;

use App\Models\Admins\Room;
use App\Models\Admins\Batch;
use Illuminate\Http\Request;
use App\Models\Admins\Degree;
use App\Models\Admins\AcademicYear;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
     {
          $this->middleware('permission:batch-list|batch-create|batch-edit|batch-delete', ['only' => ['index','store']]);
          $this->middleware('permission:batch-create', ['only' => ['create','store']]);
          $this->middleware('permission:batch-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:batch-delete', ['only' => ['destroy']]);
     }


    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $batches = Batch::where('batch','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);


        }elseif($request->course_id){
            $search = $request->course_id;
            $batches = Batch::where('degree_id','LIKE',$search)
                                ->latest('id')
                                ->paginate(10);

        }else{
            $batches = Batch::latest('id')->paginate(10);

        }

        $degrees = Degree::get();

        return view('admins.batches.index',compact('batches','degrees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academic_years = AcademicYear::get();
        $degrees = Degree::get();
        $rooms = Room::get();
        return view('admins.batches.create',compact('academic_years','degrees','rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $batch = new Batch;
        $batch->academic_year_id = $request->academic_year_id;
        $batch->batch = $request->degree_id." ".$request->academic_year_id;
        $batch->degree_id = $request->degree_id;
        $batch->room_id = $request->room_id;
        $batch->time = $request->time;
        $batch->duration = $request->duration;
        $batch->start_date = $request->start_date;
        $batch->end_date = $request->end_date;
        $batch->student_qty = $request->student_qty;
        $batch->enrolled_student = 0;
        $batch->admin_user_id = auth()->user()->id;
        $batch->save();

        return redirect()->route('admin.batches.index')->with('success','Succeeded.');
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
        $batch = Batch::find($id);
        $academic_years = AcademicYear::get();
        $degrees = Degree::get();
        $rooms = Room::get();
        return view('admins.batches.edit',compact('batch','academic_years','degrees','rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $batch = Batch::find($id);
        $batch->academic_year_id = $request->academic_year_id;
        $batch->batch = $request->degree_id." ".$request->academic_year_id;
        $batch->degree_id = $request->degree_id;
        $batch->room_id = $request->room_id;
        $batch->time = $request->time;
        $batch->duration = $request->duration;
        $batch->start_date = $request->start_date;
        $batch->end_date = $request->end_date;
        $batch->student_qty = $request->student_qty;
        $batch->admin_user_id = auth()->user()->id;
        $batch->save();

        return redirect()->route('admin.batches.index')->with('success','Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Batch::where('id',$id)->delete();
        return back()->with('success','Deleted.');
    }
}
