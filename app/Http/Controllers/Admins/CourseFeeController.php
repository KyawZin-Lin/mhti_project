<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Models\Admins\Degree;
use App\Models\Admins\CourseFee;
use App\Http\Controllers\Controller;

class CourseFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

      function __construct()
     {
          $this->middleware('permission:course-fee-list|course-fee-create|course-fee-edit|course-fee-delete', ['only' => ['index','store']]);
          $this->middleware('permission:course-fee-create', ['only' => ['create','store']]);
          $this->middleware('permission:course-fee-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:course-fee-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        if($request->course_id){
            $course_fees = CourseFee::where('course_id',$request->course_id)
                                    ->latest('id')
                                    ->paginate(10);
        }else{
            $course_fees = CourseFee::latest('id')->paginate(10);
        }

        $courses = Degree::get();


       return view('admins.course_fees.index',compact('course_fees','courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Degree::get();
        return view('admins.course_fees.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course_fee = new CourseFee;
        $course_fee->course_id = $request->course_id;
        $course_fee->amount = $request->amount;
        $course_fee->discount = $request->discount;
        $course_fee->admin_user_id = auth()->user()->id;
        $course_fee->save();

        return redirect()->route('admin.course_fees.index')->with('success','Created Successfully!');
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
        $course_fee = CourseFee::find($id);
        $courses = Degree::get();
        return view('admins.course_fees.edit',compact('course_fee','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course_fee = CourseFee::find($id);
        $course_fee->course_id = $request->course_id;
        $course_fee->amount = $request->amount;
        $course_fee->discount = $request->discount;
        $course_fee->admin_user_id = auth()->user()->id;
        $course_fee->save();

        return redirect()->route('admin.course_fees.index')->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CourseFee::where('id',$id)->delete();
        return back()->with('success','Deleted Successfully!');
    }
}
