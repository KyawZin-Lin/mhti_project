<?php

namespace App\Http\Controllers\Admins;

use Carbon\Carbon;
use App\Models\Admins\Batch;
use Illuminate\Http\Request;
use App\Models\Admins\Income;
use App\Exports\ExportIncomes;
use App\Models\Admins\Student;
use App\Models\Admins\PaymentType;
use App\Models\Admins\IncomeSource;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:income-list|income-create|income-edit|income-delete', ['only' => ['index','store']]);
          $this->middleware('permission:income-create', ['only' => ['create','store']]);
          $this->middleware('permission:income-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:income-export', ['only' => ['export']]);
          $this->middleware('permission:income-delete', ['only' => ['destroy']]);
     }


    public function index(Request $request)
    {
        if($request->from_date && $request->to_date){
            $from_date = Carbon::parse($request->from_date);
            $to_date = Carbon::parse($request->to_date);

            $incomes = Income::whereDate('date', '>=', $from_date)
                            ->whereDate('date', '<=', $to_date)
                            ->latest('id')
                            ->paginate(10);

            $incomes_count = Income::whereDate('date', '>=', $from_date)
                                    ->whereDate('date', '<=', $to_date)
                                    ->get()->count();
        }elseif($request->monthly_search){
            $monthly_search = Carbon::parse($request->monthly_search);
            $incomes = Income::whereMonth('date',$monthly_search)
                                ->whereYear('date',$monthly_search)
                                ->latest('id')
                                ->paginate(10);

            $incomes_count = Income::whereMonth('date',$monthly_search)
                                    ->whereYear('date',$monthly_search)
                                    ->get()
                                    ->count();

        }elseif($request->daily_search){
            $daily_search = Carbon::parse($request->daily_search);
            $incomes = Income::whereDate('date',$daily_search)
                                ->latest('id')
                                ->paginate(10);

            $incomes_count = Income::whereDate('date',$daily_search)
                                    ->get()
                                    ->count();

        }elseif($request->student_id){
            $incomes = Income::where('student_id',$request->student_id)
                                ->latest('id')
                                ->paginate(10);

            $incomes_count = Income::where('student_id',$request->student_id)
                                    ->get()
                                    ->count();

        }else{
            $incomes = Income::latest('id')->paginate(10);

            $incomes_count = Income::latest('id')->get()->count();
        }

        $students = Student::get();

        return view('admins.finances.incomes.index',compact('incomes','incomes_count','students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::get();
        $incomeSources = IncomeSource::get();
        $payment_types = PaymentType::get();
        $batches = Batch::get();
        return view('admins.finances.incomes.create',compact('students','incomeSources','payment_types','batches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validator::make($request->all(),[
        //     'title' => 'required',
        // ])->validate();

        $income = new Income;
        $income->date = $request->date;
        $income->title = $request->title;
        $income->code = $request->code;
        $income->student_id = $request->student_id;
        $income->course_id = $request->course_id;
        $income->batch_id = $request->batch_id;
        $income->payment_installment = $request->payment_installment;
        $income->payment_type = $request->payment_type;
        $income->payment_complete = $request->payment_complete;
        $income->income_source_id = $request->income_source_id;
        $income->particular = $request->particular;
        $income->group = $request->group;
        $income->amount = $request->amount;
        $income->remark = $request->remark;
        $income->admin_user_id = auth()->user()->id;
        $income->save();

        if($request->student_id){
            $student = Student::where('id',$request->student_id)->first();
            $student->payment_complete = $request->payment_complete;
            $student->save();
        }

        return redirect()->route('admin.incomes.index')->with('success','Created.');
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
        $income = Income::find($id);
        $students = Student::get();
        $incomeSources = IncomeSource::get();
        $payment_types = PaymentType::get();
        $batches = Batch::get();
        return view('admins.finances.incomes.edit',compact('income','students','incomeSources','payment_types','batches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validator::make($request->all(),[
        //     'title' => 'required',
        // ])->validate();

        $income = Income::find($id);
        $income->date = $request->date;
        $income->title = $request->title;
        $income->code = $request->code;
        $income->student_id = $request->student_id;
        $income->course_id = $request->course_id;
        $income->batch_id = $request->batch_id;
        $income->payment_installment = $request->payment_installment;
        $income->payment_type = $request->payment_type;
        $income->payment_complete = $request->payment_complete;
        $income->income_source_id = $request->income_source_id;
        $income->particular = $request->particular;
        $income->group = $request->group;
        $income->amount = $request->amount;
        $income->remark = $request->remark;
        $income->paid_by = $request->paid_by;
        $income->received_by = $request->received_by;
        $income->checked_by = $request->checked_by;
        $income->admin_user_id = auth()->user()->id;
        $income->save();

        if($request->student_id){
            $student = Student::where('id',$request->student_id)->first();
            $student->payment_complete = $request->payment_complete;
            $student->save();
        }

        return redirect()->route('admin.incomes.index')->with('success','Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $income = Income::where('id',$id)->first();

        // Student::where('id',$income->student_id)->delete();

        $income->delete();
        return back()->with('success','Deleted.');
    }

    public function export()
    {
        // dd(request()->all());
        if(request()->from_date && request()->to_date){
            $from_date = Carbon::parse(request()->from_date);
            $to_date = Carbon::parse(request()->to_date);

            $incomes = Income::whereDate('date', '>=', $from_date)
                            ->whereDate('date', '<=', $to_date)
                            ->latest('id')
                            ->get();


        }elseif(request()->monthly_search){
            $monthly_search = Carbon::parse(request()->monthly_search);
            $incomes = Income::whereMonth('date',$monthly_search)
                                ->whereYear('date',$monthly_search)
                                ->latest('id')
                                ->get();



        }elseif(request()->daily_search){
            $daily_search = Carbon::parse(request()->daily_search);
            $incomes = Income::whereDate('date',$daily_search)
                                ->latest('id')
                                ->get();



        }elseif(request()->student_id){
            $incomes = Income::where('student_id',request()->student_id)
                                ->latest('id')
                                ->get();



        }else{
            $incomes = Income::latest('id')->get();

            $incomes_count = Income::latest('id')->get()->count();
        }
        return Excel::download(new ExportIncomes($incomes), 'incomes.xlsx');
    }
}
