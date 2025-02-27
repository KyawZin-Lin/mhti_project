<?php

namespace App\Http\Controllers\Admins;

use App\Models\Admins\State;
use Illuminate\Http\Request;
use App\Models\Admins\Township;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TownshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:township-list|township-create|township-edit|township-delete', ['only' => ['index','store']]);
          $this->middleware('permission:township-create', ['only' => ['create','store']]);
          $this->middleware('permission:township-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:township-delete', ['only' => ['destroy']]);
     }


    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $townships = Township::with('state')
                                ->where('name','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);

            $townships_count = Township::with('state')
                                ->where('name','LIKE',$search.'%')
                                ->latest('id')
                                ->get()
                                ->count();

        }else{
            $townships = Township::with('state')
                                ->latest('id')->paginate(10);

            $townships_count = Township::with('state')
                                ->latest('id')->get()
                                ->count();
        }

        return view('admins.townships.index',compact('townships','townships_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::get();
        return view('admins.townships.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required',
            'state_id' => 'required'
        ])->validate();

        $township = new Township;
        $township->name = $request->name;
        $township->state_id = $request->state_id;
        $township->save();

        return redirect()->route('admin.townships.index')->with('success','Succeeded.');
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
        $township = Township::find($id);
        $states = State::get();
        return view('admins.townships.edit',compact('township','states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(),[
            'name' => 'required',
            'state_id' => 'required'
        ])->validate();

        $township = Township::find($id);
        $township->name = $request->name;
        $township->state_id = $request->state_id;
        $township->save();

        return redirect()->route('admin.townships.index')->with('success','Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Township::where('id',$id)->delete();
        return back()->with('success','Deleted.');
    }
}
