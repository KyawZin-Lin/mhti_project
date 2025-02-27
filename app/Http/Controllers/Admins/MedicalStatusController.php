<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admins\MedicalStatus;
use Illuminate\Support\Facades\Validator;

class MedicalStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:medical-status-list|medical-status-create|medical-status-edit|medical-status-delete', ['only' => ['index','store']]);
          $this->middleware('permission:medical-status-create', ['only' => ['create','store']]);
          $this->middleware('permission:medical-status-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:medical-status-delete', ['only' => ['destroy']]);
     }


    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $medical_statuses = MedicalStatus::with('adminUser')
                                ->where('name',$search.'%')
                                ->latest('id')
                                ->paginate(10);

            $medical_statuses_count = MedicalStatus::with('adminUser')
                                ->where('name',$search.'%')
                                ->latest('id')
                                ->get()
                                ->count();
        }else{
            $medical_statuses = MedicalStatus::with('adminUser')
                                ->latest('id')->paginate(10);

            $medical_statuses_count = MedicalStatus::with('adminUser')
                                ->latest('id')->get()->count();
        }

        return view('admins.medical_statuses.index',compact('medical_statuses','medical_statuses_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.medical_statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required',
            'times' => 'integer|max:10'
        ])->validate();

        $medical_status = new MedicalStatus;
        $medical_status->name = $request->name;
        $medical_status->times = $request->times;
        $medical_status->admin_user_id = auth()->user()->id;
        $medical_status->save();

        return redirect()->route('admin.medical_statuses.index')->with('success','Succeeded.');
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
        $medical_status = MedicalStatus::find($id);
        return view('admins.medical_statuses.edit',compact('medical_status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(),[
            'name' => 'required',
            'times' => 'integer|max:10'
        ])->validate();

        $medical_status = MedicalStatus::find($id);
        $medical_status->name = $request->name;
        $medical_status->times = $request->times;
        $medical_status->admin_user_id = auth()->user()->id;
        $medical_status->save();

        return redirect()->route('admin.medical_statuses.index')->with('success','Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MedicalStatus::where('id',$id)->delete();
        return back()->with('success','Deleted.');
    }
}
