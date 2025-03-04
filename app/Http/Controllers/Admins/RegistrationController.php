<?php

namespace App\Http\Controllers\Admins;

use Carbon\Carbon;
use App\Models\Admins\Batch;
use Illuminate\Http\Request;
use App\Models\Admins\Degree;
use App\Models\Admins\Income;
use App\Models\Admins\Student;
use App\Models\Admins\CourseFee;
use App\Models\Admins\PaymentType;
use App\Models\Admins\IncomeDetail;
use App\Models\Admins\IncomeSource;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:voucher-list|voucher', ['only' => ['index','chooseType']]);
     }

    public function chooseType()
    {
        return view('admins.registrations.choose_type');
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

        }elseif($request->monthly_search){
            $monthly_search = Carbon::parse($request->monthly_search);
            $incomes = Income::whereMonth('date',$monthly_search)
                                ->whereYear('date',$monthly_search)
                                ->latest('id')
                                ->paginate(10);


        }elseif($request->daily_search){
            $daily_search = Carbon::parse($request->daily_search);
            $incomes = Income::whereDate('date',$daily_search)
                                ->latest('id')
                                ->paginate(10);



        }elseif($request->student_id){
            $incomes = Income::where('student_id',$request->student_id)
                                ->latest('id')
                                ->paginate(10);


        }elseif($request->student_name){
            $student_id = Student::where('name','LIKE',$request->student_name.'%')->select('id')->get()->toArray();
            $incomes = Income::whereIn('student_id',[$student_id])->latest('id')->paginate(10);
        }else{
            $incomes = Income::latest('id')->paginate(10);
        }

        $students = Student::get();

        return view('admins.registrations.index',compact('incomes','students'));
    }

    public function courseBatchAjax(Request $request){
        $student_id = $request->studentId;
        $student = Student::where('id',$student_id)->first();
        $course = Degree::where('id',$student->degree_id)->first();
        $batch = Batch::where('id',$student->batch_id)->first();
        $course_fee = CourseFee::where('course_id',$student->degree->id)->first();

        $income= Income::where('student_id',$student_id)->where('course_id',$course->id)->latest()->first();
        // dd($income);
        if(isset($income)){
            $leftMoney= $income->left_money;
        }
        $amount = (int)$course_fee->amount - ((int)$course_fee->amount * ((int)$course_fee->discount/100));

        return response()->json([
            'success' => 'Success',
            'course' => $course->name,
            'course_id' => $course->id,
            'batch' => $batch->batch,
            'price' => $course_fee->amount,
            'discount' => $course_fee->discount,
            'amount' => $amount,
            'left_money' => isset($leftMoney)? $leftMoney : null,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $students = Student::all();
        $incomeSources = IncomeSource::all();
        $payment_types = PaymentType::all();
        $courses = Degree::all();
        $batches = Batch::all();

        $voucher_no = $this->generateVoucherNumber();

        if ($request->registration_type == 'Student') {
            return view('admins.registrations.student_registration', compact('students', 'incomeSources', 'payment_types', 'courses', 'batches', 'voucher_no'));
        } elseif ($request->registration_type == 'Office') {
            return view('admins.registrations.office_registration', compact('students', 'incomeSources', 'payment_types', 'courses', 'batches', 'voucher_no'));
        }
    }

    private function generateVoucherNumber()
    {
        $existingVouchers = Income::orderBy('voucher_no', 'asc')
            ->pluck('voucher_no')
            ->map(fn($voucher) => (int) substr($voucher, 4))
            ->toArray();

        $newVoucherNumber = $this->findMissingNumber($existingVouchers);

        return date("Y") . str_pad($newVoucherNumber, 5, "0", STR_PAD_LEFT);
    }

    private function findMissingNumber(array $existingNumbers): int
    {
        if (empty($existingNumbers)) {
            return 1;
        }

        for ($i = 1; $i <= max($existingNumbers) + 1; $i++) {
            if (!in_array($i, $existingNumbers)) {
                return $i;
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(request()->all());
        $course = Degree::where('id',$request->course_id)->first();

        if($course){
            $income_abbre = Income::where('course_abbre','LIKE',$course->abbreviation)->latest('id')->first();
        }
        $income = new Income;
        $income->date = $request->date;
        $income->voucher_no = $request->voucher_no;
        $income->student_id = $request->student_id;
        $income->course_id = $request->course_id;
        $income->batch_id = $request->batch_id;
        $income->payment_installment = $request->payment_installment;
        $income->payment_type = $request->payment_type;
        $income->payment_complete = $request->payment_complete;
        $income->income_source_id = $request->income_source_id;
        $income->particular = $request->particular;
        $income->group = $request->group;
            if($request->status == 'Student'){
            $income->title = $request->title;
            $income->code = $request->code;
            $income->amount = $request->amount;
            $income->price = $request->price;

            }
        $income->remark = $request->remark;
        $income->pay_money = $request->pay_money;
        $income->left_money = $request->left_money;
        $income->discount = $request->discount;

        $income->paid_by = $request->paid_by;
        $income->received_by = $request->received_by;
        $income->checked_by = $request->checked_by;
        $income->status = $request->status;
        if($course)
        {
            $income->course_abbre = $course->abbreviation;
            if(isset($income_abbre->course_no)){
            $income->course_no = $income_abbre->course_no + 1;
            }else{
                $income->course_no = 401;
            }
        }

        $income->admin_user_id = auth()->user()->id;
        $income->save();

        if($request->student_id){
            $student = Student::where('id',$request->student_id)->first();
            $student->payment_complete = $request->payment_complete;
            $student->save();
        }

        if($income && $request->status == 'Office'){

            for($i=0;$i<count($request['code']);$i++){
                $income_detail = new IncomeDetail;
                $income_detail->income_id = $income->id;
                $income_detail->student_id = $request->student_id;
                $income_detail->code = $request['code'][$i];
                $income_detail->description = $request['title'][$i];
                $income_detail->amount = $request['amount'][$i];
                $income_detail->save();
            }

            $incomeDetails = IncomeDetail::where('income_id',$income->id)->get();

            return view('admins.registrations.receipt',compact('income','incomeDetails'));
        }

        return view('admins.registrations.receipt',compact('income'));

        // return redirect()->route('admin.registrations.index')->with('success','Created.');

        // return back()->with('success','Created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $income = Income::find($id);
        $incomes = Income::where('date','LIKE',$income->date)
                            ->where('student_id','LIKE',$income->student_id)
                            ->get();
        $incomeDetails = IncomeDetail::where('income_id',$id)->get();
        return view('admins.registrations.receipt',compact('income','incomes','incomeDetails'));
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
        $courses = Degree::get();
        $batches = Batch::get();
        if( $income->status == 'Student')
        {
            return view('admins.registrations.edit_student_registration',compact('income','students','incomeSources','payment_types','courses','batches'));
        }elseif($income->status == 'Office'){
            $income_details = IncomeDetail::where('income_id',$id)->get();
            return view('admins.registrations.edit_office_registration',compact('income','students','incomeSources','payment_types','courses','batches','income_details'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $income = Income::find($id);
        $income->date = $request->date;
        $income->student_id = $request->student_id;
        $income->course_id = $request->course_id;
        $income->batch_id = $request->batch_id;
        $income->payment_installment = $request->payment_installment;
        $income->payment_type = $request->payment_type;
        $income->payment_complete = $request->payment_complete;
        $income->income_source_id = $request->income_source_id;
        $income->particular = $request->particular;
        $income->group = $request->group;
        if($request->status == 'Student')
        {
            $income->title = $request->title;
            $income->code = $request->code;
            $income->amount = $request->amount;
        }
        $income->remark = $request->remark;
        $income->paid_by = $request->paid_by;
        $income->received_by = $request->received_by;
        $income->checked_by = $request->checked_by;
        $income->status = $request->status;

        $income->admin_user_id = auth()->user()->id;
        $income->save();

        if($request->status == "Office"){
            if(isset($request['code'])){
                for($i=0;$i<count($request['code']);$i++){
                    if(isset($request['income_detail_id'][$i])){
                        $additional['code'] = $request['code'][$i];
                        $additional['description'] = $request['title'][$i];
                        $additional['amount'] = $request['amount'][$i];
                        $update_additional = IncomeDetail::where('id',$request['income_detail_id'][$i])
                                            ->update($additional);
                    }
                }
            }
        }

        return redirect()->route('admin.registrations.index')->with('success','Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $income = Income::where('id',$id)->first();

        IncomeDetail::where('income_id',$id)->delete();

        $income->delete();
        return back()->with('success','Deleted.');
    }

    public function schoolFeeReceipt()
    {

    }

    public function deletedList(){
        $incomes = Income::onlyTrashed()->paginate();
        // dd($incomes);
        return view('admins.registrations.deleted-history',compact('incomes'));
    }
}
