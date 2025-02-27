<?php

namespace App\Http\Controllers\Admins;

use App\Models\Admins\Floor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->search){
            $floors = Floor::where('name','LIKE',$request->search.'%')
                                    ->latest('id')
                                    ->paginate(10);
        }else{
            $floors = Floor::latest('id')->paginate(10);
        }

        return view('admins.room_structures.floors.index',compact('floors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.room_structures.floors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $floor = new Floor;
        $floor->name = $request->name;
        $floor->save();

        return redirect()->route('admin.floors.index')->with('success','Created Successfully.');
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
        $floor = Floor::find($id);
        return view('admins.room_structures.floors.edit',compact('floor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $floor = Floor::find($id);
        $floor->name = $request->name;
        $floor->save();

        return redirect()->route('admin.floors.index')->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Floor::where('id',$id)->delete();
        return back()->with('success','Deleted Successfully.');
    }
}
