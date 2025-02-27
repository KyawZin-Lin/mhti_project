<?php

namespace App\Http\Controllers\Admins;

use App\Models\Admins\Staff;
use Illuminate\Http\Request;
use App\Models\Admins\Expend;
use App\Models\Admins\Teacher;
use App\Models\Admins\StaffLeave;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StaffLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
       function __construct()
     {
          $this->middleware('permission:staff-leave-list|staff-leave-create|staff-leave-edit|staff-leave-delete', ['only' => ['index','store']]);
          $this->middleware('permission:staff-leave-create', ['only' => ['create','store']]);
          $this->middleware('permission:staff-leave-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:staff-leave-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $staff_leaves = StaffLeave::whereNotNull('staff_id')
                                ->where('date','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);
        }else{
            $staff_leaves = StaffLeave::whereNotNull('staff_id')
                                    ->latest('id')->paginate(10);

        }

        return view('admins.staff_leaves.index',compact('staff_leaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::get();
        $staff = Staff::get();
        return view('admins.staff_leaves.create',compact('teachers','staff'));
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
            $staff_leave->staff_id = $request->staff_id;
            $staff_leave->date = $request->date;
            $staff_leave->fine = $request->fine;
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

            return redirect()->route('admin.staff_leaves.index')
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
        $staff_leave = StaffLeave::find($id);
        $teachers = Teacher::get();
        $staff = Staff::get();
        return view('admins.staff_leaves.edit',compact('staff_leave','teachers','staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $staff_leave = StaffLeave::find($id);
            $staff_leave->teacher_id = $request->teacher_id;
            $staff_leave->staff_id = $request->staff_id;
            $staff_leave->date = $request->date;
            $staff_leave->fine = $request->fine;
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

            return redirect()->route('admin.staff_leaves.index')
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
