<?php

namespace App\Http\Controllers\Admins;

use Carbon\Carbon;
use App\Models\Admins\Batch;
use App\Models\Admins\Staff;
use Illuminate\Http\Request;
use App\Models\Admins\Degree;
use App\Models\Admins\Expend;
use App\Exports\ExportExpends;
use App\Models\Admins\Teacher;
use App\Models\Admins\StaffLeave;
use App\Models\Admins\PaymentType;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class ExpendController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:expend-list|expend-create|expend-edit|expend-delete', ['only' => ['index','store']]);
          $this->middleware('permission:expend-create', ['only' => ['create','store']]);
          $this->middleware('permission:expend-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:expend-export', ['only' => ['export']]);
          $this->middleware('permission:expend-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        if($request->from_date && $request->to_date){
            $from_date = Carbon::parse($request->from_date);
            $to_date = Carbon::parse($request->to_date);

            $expends = Expend::whereDate('date', '>=', $from_date)
                            ->whereDate('date', '<=', $to_date)
                            ->latest('id')
                            ->paginate(10);

            $expends_count = Expend::whereDate('date', '>=', $from_date)
                                    ->whereDate('date', '<=', $to_date)
                                    ->get()->count();
        }elseif($request->monthly_search){
            $monthly_search = Carbon::parse($request->monthly_search);
            $expends = Expend::whereMonth('date',$monthly_search)
                                ->whereYear('date',$monthly_search)
                                ->latest('id')
                                ->paginate(10);

            $expends_count = Expend::whereMonth('date',$monthly_search)
                                    ->whereYear('date',$monthly_search)
                                    ->get()
                                    ->count();

        }elseif($request->daily_search){
            $daily_search = Carbon::parse($request->daily_search);
            $expends = Expend::whereDate('date',$daily_search)
                                ->latest('id')
                                ->paginate(10);

            $expends_count = Expend::whereDate('date',$daily_search)
                                    ->get()
                                    ->count();

        }else{
            $expends = Expend::latest('id')->paginate(10);

            $expends_count = Expend::latest('id')->get()->count();
        }

        return view('admins.finances.expends.index',compact('expends','expends_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::get();
        $staff = Staff::get();
        $payment_types = PaymentType::get();
        $courses = Degree::get();
        $batches = Batch::get();
        return view('admins.finances.expends.create',compact('teachers','staff','payment_types','courses','batches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validator::make($request->all(),[
        //     'title' => 'required',
        // ])->validate();

        $expend = new Expend;
        $expend->date = $request->date;
        $expend->title = $request->title;
        $expend->description = $request->description;
        $expend->particular = $request->particular;
        $expend->name = $request->name;
        $expend->teacher_id = $request->teacher_id;
        $expend->staff_id = $request->staff_id;
        $expend->course_id = $request->course_id;
        $expend->batch_id = $request->batch_id;
        $expend->payment_type_id = $request->payment_type_id;
        $expend->amount = $request->amount;
        $expend->qty = $request->qty;
        $expend->price = $request->price;
        $expend->thing = $request->thing;
        $expend->remark = $request->remark;
        $expend->bonus = $request->bonus;
        $expend->fine = $request->fine;
        $expend->admin_user_id = auth()->user()->id;
        $expend->save();

        return redirect()->route('admin.expends.index')->with('success','Created.');
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
        $expend = Expend::find($id);
        $teachers = Teacher::get();
        $staff = Staff::get();
        $payment_types = PaymentType::get();
        $courses = Degree::get();
        $batches = Batch::get();
        return view('admins.finances.expends.edit',compact('expend','teachers','staff','payment_types','courses','batches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validator::make($request->all(),[
        //     'title' => 'required',
        // ])->validate();

        $expend = Expend::find($id);
        $expend->date = $request->date;
        $expend->title = $request->title;
        $expend->description = $request->description;
        $expend->particular = $request->particular;
        $expend->name = $request->name;
        $expend->teacher_id = $request->teacher_id;
        $expend->staff_id = $request->staff_id;
        $expend->course_id = $request->course_id;
        $expend->batch_id = $request->batch_id;
        $expend->payment_type_id = $request->payment_type_id;
        $expend->amount = $request->amount;
        $expend->qty = $request->qty;
        $expend->price = $request->price;
        $expend->thing = $request->thing;
        $expend->remark = $request->remark;
        $expend->bonus = $request->bonus;
        $expend->fine = $request->fine;
        $expend->admin_user_id = auth()->user()->id;
        $expend->save();

        return redirect()->route('admin.expends.index')->with('success','Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expense = Expend::where('id',$id)->first();

        // Teacher::where('id',$expense->teacher_id)->delete();

        $expense->delete();

        return back()->with('success','Deleted.');
    }

    public function export()
    {
        return Excel::download(new ExportExpends, 'expenses.xlsx');
    }

    public function teacherAjax(Request $request){
        $teacherId = $request->teacherId;

        $teacher = Teacher::where('id',$teacherId)->first();

        $today = Carbon::now();

        $month = $today->format('m');

        $year = $today->format('Y');

        $teacherLeaves = StaffLeave::where('teacher_id',$teacherId)
                                    ->whereMonth('date',$month)
                                    ->whereYear('date',$year)
                                    ->get();

        return response()->json([
            'message' => 'success',
            'teacher' => $teacher,
            'teacherLeaves' => $teacherLeaves,
        ]);
    }

    public function staffAjax(Request $request){
        $staffId = $request->staffId;

        $staff = Staff::where('id',$staffId)->first();

        $today = Carbon::now();

        $month = $today->format('m');

        $year = $today->format('Y');

        $staffLeaves = StaffLeave::where('staff_id',$staffId)
                                    ->whereMonth('date',$month)
                                    ->whereYear('date',$year)
                                    ->get();

        return response()->json([
            'message' => 'success',
            'staff' => $staff,
            'staffLeaves' => $staffLeaves,
        ]);
    }
}
