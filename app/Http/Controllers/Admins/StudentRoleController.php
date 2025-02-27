<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class StudentRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->search)
        {
            $student_roles = Role::where('name','like',$request->search.'%')
                                    ->latest('id')
                                    ->paginate(10);

            $student_roles_count = Role::where('name','like',$request->search.'%')
                                    ->latest('id')
                                    ->get()
                                    ->count();
        }else{
            $student_roles = Role::latest('id')
                                    ->paginate(10);

            $student_roles_count = Role::latest('id')
                                    ->get()
                                    ->count();
        }

        return view('admins.student_user_managements.roles.index',compact('student_roles','student_roles_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::where('guard_name','student')->orderBy('name','asc')->get();
        return view('admins.student_user_managements.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name" => "required|unique:roles,name",
        ]);

        $role = Role::create(
            [
                'guard_name' => 'student',
                'name' => $request->name,
            ]);

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.student_roles.index')
            ->with('success', 'Role Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('admins.student_user_managements.roles.detail',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student_role = Role::find($id);
        $permissions = Permission::where('guard_name','student')->orderBy('name','asc')->get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('admins.student_user_managements.roles.edit',compact('student_role','permissions','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::find($id);
        $role->update(
            [
                'guard_name' => 'student',
                'name' => $request->name,
            ]);

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.student_roles.index')
            ->with('success', 'Role Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::where('id',$id)->delete();
        return back()->with('success','Role Deleted Successfully.');
    }
}
