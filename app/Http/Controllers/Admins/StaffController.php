<?php

namespace App\Http\Controllers\Admins;

use App\Models\Admins\Staff;
use Illuminate\Http\Request;
use App\Models\Admins\Expend;
use App\Models\Admins\StaffLeave;
use App\Models\Admins\PaymentType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */

      function __construct()
     {
          $this->middleware('permission:staff-list|staff-create|staff-edit|staff-delete', ['only' => ['index','store']]);
          $this->middleware('permission:staff-create', ['only' => ['create','store']]);
          $this->middleware('permission:staff-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:staff-detail', ['only' => ['show']]);
          $this->middleware('permission:staff-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $staff = Staff::where('name','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);
        }else{
            $staff = Staff::latest('id')->paginate(10);

        }

        return view('admins.staff.index',compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payment_types = PaymentType::get();
        return view('admins.staff.create',compact('payment_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
        ])->validate();

            $staff = new Staff;
            $staff->name = $request->name;
            $staff->position = $request->position;
            $staff->nrc = $request->nrc;
            $staff->phone = $request->phone;
            $staff->address = $request->address;
            // $staff->salary_date = $request->salary_date;
            $staff->standard_salary = $request->standard_salary;
            // $staff->payment_type_id = $request->payment_type_id;
            $staff->admin_user_id = auth()->user()->id;
            $staff->save();

            if($staff){
                $expend = new Expend;
                $expend->staff_id = $staff->id;
                $expend->date = $request->salary_date;
                $expend->amount = $request->salary;
                $expend->payment_type_id = $request->payment_type_id;
                $expend->save();
            }

            return redirect()->route('admin.staff.index')
                ->with('success', 'Created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $staff = Staff::with('paymentType')->find($id);
        $expenses = Expend::where('staff_id',$staff->id)->latest('id')->paginate(10);
        $staff_leaves = StaffLeave::where('staff_id',$staff->id)->latest('id')->paginate(10);
        return view('admins.staff.detail',compact('staff','expenses','staff_leaves'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staff = Staff::find($id);
        $payment_types = PaymentType::get();
        $expense = Expend::where('staff_id',$id)->first();
        return view('admins.staff.edit',compact('staff','payment_types','expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $staff = Staff::find($id);
            $staff->name = $request->name;
            $staff->position = $request->position;
            $staff->nrc = $request->nrc;
            $staff->phone = $request->phone;
            $staff->address = $request->address;
            // $staff->salary_date = $request->salary_date;
            $staff->standard_salary = $request->standard_salary;
            // $staff->payment_type_id = $request->payment_type_id;
            $staff->admin_user_id = auth()->user()->id;
            $staff->save();

            if($staff){
                $expend = Expend::where('staff_id',$id)->first();
                if(isset($expend->staff_id)){
                    $expend->staff_id = $staff->id;
                    $expend->date = $request->salary_date;
                    $expend->amount = $request->salary;
                    $expend->payment_type_id = $request->payment_type_id;
                    $expend->save();
                }else{
                    $expend = new Expend;
                    $expend->staff_id = $staff->id;
                    $expend->date = $request->salary_date;
                    $expend->amount = $request->salary;
                    $expend->payment_type_id = $request->payment_type_id;
                    $expend->save();
                }

            }

            return redirect()->route('admin.staff.index')
                ->with('success', 'Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Staff::where('id',$id)->delete();
        Expend::where('staff_id',$id)->delete();
        StaffLeave::where('staff_id',$id)->delete();
        return back()->with('success','Deleted.');
    }
}
