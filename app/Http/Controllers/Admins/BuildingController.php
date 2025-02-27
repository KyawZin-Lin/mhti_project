<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Models\Admins\Building;
use App\Http\Controllers\Controller;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->search){
            $buildings = Building::where('name','LIKE',$request->search.'%')
                                    ->latest('id')
                                    ->paginate(10);
        }else{
            $buildings = Building::latest('id')->paginate(10);
        }

        return view('admins.room_structures.buildings.index',compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.room_structures.buildings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $building = new Building;
        $building->name = $request->name;
        $building->save();

        return redirect()->route('admin.buildings.index')->with('success','Created Successfully.');
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
        $building = Building::find($id);
        return view('admins.room_structures.buildings.edit',compact('building'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $building = Building::find($id);
        $building->name = $request->name;
        $building->save();

        return redirect()->route('admin.buildings.index')->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Building::where('id',$id)->delete();
        return back()->with('success','Deleted Successfully.');
    }
}
