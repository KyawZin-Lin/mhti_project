<?php

namespace App\Http\Controllers\Admins;

use App\Models\Admins\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:state-list|state-create|state-edit|state-delete', ['only' => ['index','store']]);
          $this->middleware('permission:state-create', ['only' => ['create','store']]);
          $this->middleware('permission:state-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:state-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $states = State::where('name','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);

            $states_count = State::where('name','LIKE',$search.'%')
                                ->latest('id')
                                ->get()
                                ->count();

        }else{
            $states = State::latest('id')->paginate(10);

            $states_count = State::latest('id')->get()->count();
        }

        return view('admins.states.index',compact('states','states_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.states.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required',
        ])->validate();

        $state = new State;
        $state->name = $request->name;
        $state->save();

        return redirect()->route('admin.states.index')->with('success','Succeeded.');
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
        $state = State::find($id);
        return view('admins.states.edit',compact('state'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(),[
            'name' => 'required',
        ])->validate();

        $state = State::find($id);
        $state->name = $request->name;
        $state->save();

        return redirect()->route('admin.states.index')->with('success','Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        State::where('id',$id)->delete();
        return back()->with('success','Deleted.');
    }
}
