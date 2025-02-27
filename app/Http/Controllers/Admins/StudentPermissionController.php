<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class StudentPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->search)
        {
            $student_permissions = Permission::where('name','like',$request->search.'%')
                                    ->latest('id')
                                    ->paginate(10);

            $student_permissions_count = Permission::where('name','like',$request->search.'%')
                                    ->latest('id')
                                    ->get()
                                    ->count();
        }else{
            $student_permissions = Permission::latest('id')
                                    ->paginate(10);
            $student_permissions_count = Permission::latest('id')
                                    ->get()
                                    ->count();
        }

        return view('admins.student_user_managements.permissions.index',compact('student_permissions','student_permissions_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.student_user_managements.permissions.create');
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
                'guard_name' => 'student',
                'name' => $request->name,
            ]);

        return redirect()->route('admin.student_permissions.index')
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
        $student_permission = Permission::find($id);
        return view('admins.student_user_managements.permissions.edit',compact('student_permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permission = Permission::find($id);
        $permission->update(
            [
                'guard_name' => 'student',
                'name' => $request->name,
            ]);

        return redirect()->route('admin.student_permissions.index')
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
