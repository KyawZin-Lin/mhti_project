<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
          $this->middleware('permission:permission-create', ['only' => ['create','store']]);
          $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        if($request->search)
        {
            $permissions = Permission::where('guard_name','admin_user')
                                    ->where('name','like',$request->search.'%')
                                    ->latest('id')
                                    ->paginate(10);

            $permissions_count = Permission::where('guard_name','admin_user')
                                    ->where('name','like',$request->search.'%')
                                    ->latest('id')
                                    ->get()
                                    ->count();
        }else{
            $permissions = Permission::where('guard_name','admin_user')
                                    ->latest('id')
                                    ->paginate(10);
            $permissions_count = Permission::where('guard_name','admin_user')
                                    ->latest('id')
                                    ->get()
                                    ->count();
        }

        return view('admins.user_managements.permissions.index',compact('permissions','permissions_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.user_managements.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name" => "required",
        ]);


        $permission = Permission::create(
            [
                'name' => $request->name,
            ]);

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission Created successfully!');
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
        $permission = Permission::find($id);
        return view('admins.user_managements.permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permission = Permission::find($id);
        $permission->update(
            [
                'name' => $request->name,
            ]);

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Permission::where('id',$id)->delete();
        return back()->with('success','Permission Deleted Successfully.');
    }
}
