<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Models\Admins\Degree;
use App\Models\Admins\AcademicYear;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:academic-year-list|academic-year-create|academic-year-edit|academic-year-delete', ['only' => ['index','store']]);
          $this->middleware('permission:academic-year-create', ['only' => ['create','store']]);
          $this->middleware('permission:academic-year-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:academic-year-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $academic_years = AcademicYear::with('degree','adminUser')
                                ->where('name','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);

            $academic_yearsCount = AcademicYear::with('degree','adminUser')
                                ->where('name','LIKE',$search.'%')
                                ->latest('id')
                                ->get()
                                ->count();

        }else{
            $academic_years = AcademicYear::with('degree','adminUser')
                                ->latest('id')->paginate(10);

            $academic_yearsCount = AcademicYear::with('degree','adminUser')
                                ->latest('id')->get()->count();
        }
        return view('admins.academic_years.index',compact('academic_years','academic_yearsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $degrees = Degree::get();
        return view('admins.academic_years.create',compact('degrees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required',
        ])->validate();

        $academic = new AcademicYear;
        $academic->name = $request->name;
        $academic->times = $request->times;
        $academic->degree_id = $request->degree_id;
        $academic->remarks = $request->remarks;
        $academic->admin_user_id = auth()->user()->id;
        $academic->save();

        return redirect()->route('admin.academic_years.index')->with('success','Succeeded.');
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
        $academic_year = AcademicYear::find($id);
        $degrees = Degree::get();
        return view('admins.academic_years.edit',compact('academic_year','degrees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(),[
            'name' => 'required',
        ])->validate();

        $academic = AcademicYear::find($id);
        $academic->name = $request->name;
        $academic->times = $request->times;
        $academic->degree_id = $request->degree_id;
        $academic->remarks = $request->remarks;
        $academic->admin_user_id = auth()->user()->id;
        $academic->save();

        return redirect()->route('admin.academic_years.index')->with('success','Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AcademicYear::where('id',$id)->delete();
        return back()->with('success','Deleted.');
    }
}
