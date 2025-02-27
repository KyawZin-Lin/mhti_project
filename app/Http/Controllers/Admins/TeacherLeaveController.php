<?php

namespace App\Http\Controllers\Admins;

use App\Models\Admins\Staff;
use Illuminate\Http\Request;
use App\Models\Admins\Expend;
use App\Models\Admins\Teacher;
use App\Models\Admins\StaffLeave;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TeacherLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
      function __construct()
     {
          $this->middleware('permission:teacher-leave-list|teacher-leave-create|teacher-leave-edit|teacher-leave-delete', ['only' => ['index','store']]);
          $this->middleware('permission:teacher-leave-create', ['only' => ['create','store']]);
          $this->middleware('permission:teacher-leave-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:teacher-leave-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $teacher_leaves = StaffLeave::where('date','LIKE',$search.'%')
                                ->whereNotNull('teacher_id')
                                ->latest('id')
                                ->paginate(10);
        }else{
            $teacher_leaves = StaffLeave::whereNotNull('teacher_id')->latest('id')->paginate(10);

        }

        return view('admins.teacher_leaves.index',compact('teacher_leaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::get();
        $staff = Staff::get();
        return view('admins.teacher_leaves.create',compact('teachers','staff'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validator::make($request->all(), [
        //     'name' => 'required',
        // ])->validate();

            $staff_leave = new StaffLeave;
            $staff_leave->teacher_id = $request->teacher_id;
            // $staff_leave->staff_id = $request->staff_id;
            $staff_leave->date = $request->date;
            // $staff_leave->fine = $request->fine;
            $staff_leave->note = $request->note;
            $staff_leave->admin_user_id = auth()->user()->id;
            $staff_leave->save();

            // if($staff_leave){
            //     $expend = new Expend;
            //     $expend->teacher_id = $request->teacher_id;
            //     $expend->staff_id = $request->staff_id;
            //     $expend->date = $request->date;
            //     $expend->amount = $request->fine;
            //     $expend->title = "Staff Leave";
            //     $expend->save();
            // }

            return redirect()->route('admin.teacher_leaves.index')
                ->with('success', 'Created.');
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
        $teacher_leave = StaffLeave::find($id);
        $teachers = Teacher::get();
        $staff = Staff::get();
        return view('admins.teacher_leaves.edit',compact('teacher_leave','teachers','staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $staff_leave = StaffLeave::find($id);
            $staff_leave->teacher_id = $request->teacher_id;
            // $staff_leave->staff_id = $request->staff_id;
            $staff_leave->date = $request->date;
            // $staff_leave->fine = $request->fine;
            $staff_leave->note = $request->note;
            $staff_leave->admin_user_id = auth()->user()->id;
            $staff_leave->save();

            // if($staff_leave){
            //     $expend = Expend::where('staff_id',$staff_leave->staff_id)
            //                     ->where('title','LIKE','Staff Leave')
            //                     ->first();
            //     if(isset($expend->staff_id)){
            //         $expend->staff_id = $staff_leave->staff_id;
            //         $expend->date = $request->date;
            //         $expend->amount = $request->fine;
            //         $expend->title = "Staff Leave";
            //         $expend->save();
            //     }else{
            //         $expend = new Expend;
            //         $expend->staff_id = $request->staff_id;
            //         $expend->date = $request->date;
            //         $expend->amount = $request->fine;
            //         $expend->title = "Staff Leave";
            //         $expend->save();
            //     }

            // }

            return redirect()->route('admin.teacher_leaves.index')
                ->with('success', 'Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        StaffLeave::where('id',$id)->delete();
        return back()->with('success','Deleted.');
    }
}
