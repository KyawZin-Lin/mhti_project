<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Models\Admins\PaymentType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:payment-type-list|payment-type-create|payment-type-edit|payment-type-delete', ['only' => ['index','store']]);
          $this->middleware('permission:payment-type-create', ['only' => ['create','store']]);
          $this->middleware('permission:payment-type-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:payment-type-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $payment_types = PaymentType::where('name','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);
        }else{
            $payment_types = PaymentType::latest('id')->paginate(10);

        }

        return view('admins.payment_types.index',compact('payment_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.payment_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required',
        ])->validate();

        $payment_type = new PaymentType;
        $payment_type->name = $request->name;
        $payment_type->save();

        return redirect()->route('admin.payment_types.index')->with('success','Succeeded.');
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
        $payment_type = PaymentType::find($id);
        return view('admins.payment_types.edit',compact('payment_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $payment_type = PaymentType::find($id);
        $payment_type->name = $request->name;
        $payment_type->save();

        return redirect()->route('admin.payment_types.index')->with('success','Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PaymentType::where('id',$id)->delete();
        return back()->with('success','Deleted.');
    }
}
