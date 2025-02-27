<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Models\Admins\IncomeSource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class IncomeSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:income-source-list|income-source-create|income-source-edit|income-source-delete', ['only' => ['index','store']]);
          $this->middleware('permission:income-source-create', ['only' => ['create','store']]);
          $this->middleware('permission:income-source-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:income-source-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $income_sources = IncomeSource::where('name','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);
        }else{
            $income_sources = IncomeSource::latest('id')->paginate(10);
        }

        return view('admins.finances.income_sources.index',compact('income_sources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.finances.income_sources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required',
        ])->validate();

        $income_source = new IncomeSource;
        $income_source->name = $request->name;
        $income_source->save();

        return redirect()->route('admin.income_sources.index')->with('success','Succeed.');
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
        $income_source = IncomeSource::find($id);
        return view('admins.finances.income_sources.edit',compact('income_source'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $income_source = IncomeSource::find($id);
        $income_source->name = $request->name;
        $income_source->save();

        return redirect()->route('admin.income_sources.index')->with('success','Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        IncomeSource::where('id',$id)->delete();
        return back()->with('success','Deleted.');
    }
}
