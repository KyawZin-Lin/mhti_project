<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Models\Admins\Branch;
use App\Http\Controllers\Controller;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->search){
            $branches = Branch::where('name','LIKE',$request->search.'%')
                                    ->latest('id')
                                    ->paginate(10);
        }else{
            $branches = Branch::latest('id')->paginate(10);
        }

        return view('admins.room_structures.branches.index',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.room_structures.branches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $branch = new Branch;
        $branch->name = $request->name;
        $branch->save();

        return redirect()->route('admin.branches.index')->with('success','Created Successfully.');
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
        $branch = Branch::find($id);
        return view('admins.room_structures.branches.edit',compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $branch = Branch::find($id);
        $branch->name = $request->name;
        $branch->save();

        return redirect()->route('admin.branches.index')->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Branch::where('id',$id)->delete();
        return back()->with('success','Deleted Successfully.');
    }
}
