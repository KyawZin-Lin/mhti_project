<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
          $this->middleware('permission:role-create', ['only' => ['create','store']]);
          $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:role-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        $auth_role_name = auth()->user()->getRoleNames();
        if($auth_role_name[0] == 'Superadmin')
        {
            if($request->search)
            {
                $roles = Role::where('guard_name','admin_user')
                                        ->where('name','like',$request->search.'%')
                                        ->latest('id')
                                        ->paginate(10);

                $roles_count = Role::where('guard_name','admin_user')
                                        ->where('name','like',$request->search.'%')
                                        ->latest('id')
                                        ->get()
                                        ->count();
            }else{
                $roles = Role::where('guard_name','admin_user')
                                        ->latest('id')
                                        ->paginate(10);

                $roles_count = Role::where('guard_name','admin_user')
                                        ->latest('id')
                                        ->get()
                                        ->count();
            }
        }else{
            if($request->search)
            {
            $roles = Role::where('guard_name','admin_user')
                                    ->where('name','!=','Superadmin')
                                    ->where('name','like',$request->search.'%')
                                    ->latest('id')
                                    ->paginate(10);

            $roles_count = Role::where('guard_name','admin_user')
                                    ->where('name','!=','Superadmin')
                                    ->where('name','like',$request->search.'%')
                                    ->latest('id')
                                    ->get()
                                    ->count();
        }else{
            $roles = Role::where('guard_name','admin_user')
                                    ->where('name','!=','Superadmin')
                                    ->latest('id')
                                     ->paginate(10);

            $roles_count = Role::where('guard_name','admin_user')
                                    ->where('name','!=','Superadmin')
                                    ->latest('id')
                                    ->get()
                                    ->count();
            }
        }

        return view('admins.user_managements.roles.index',compact('roles','roles_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::where('guard_name','admin_user')->orderBy('name','asc')->get();
        return view('admins.user_managements.roles.create',compact('permissions'));
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
                'name' => $request->name,
            ]);

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.roles.index')
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

        return view('admins.user_managements.roles.detail',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        $permissions = Permission::where('guard_name','admin_user')->orderBy('name','asc')->get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('admins.user_managements.roles.edit',compact('role','permissions','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::find($id);
        $role->update(
            [
                'name' => $request->name,
            ]);

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.roles.index')
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
