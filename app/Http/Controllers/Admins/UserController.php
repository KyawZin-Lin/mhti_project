<?php

namespace App\Http\Controllers\Admins;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
          $this->middleware('permission:user-create', ['only' => ['create','store']]);
          $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:user-delete', ['only' => ['destroy']]);
     }


    public function index(Request $request)
    {
        $auth_id = auth()->user()->id;
        $limit_user = auth()->user()->limit_user;
        $count = AdminUser::where('created_by',$auth_id)->count();

        $auth_role_name = auth()->user()->getRoleNames();
        if($auth_role_name[0] == 'Superadmin')
        {
            if($request->search){
                $search = $request->search;

                $users = AdminUser::where('name','LIKE',$search.'%')
                                        ->latest('id')
                                        ->paginate(10);
                $usersCount = AdminUser::where('name','LIKE',$search.'%')
                                        ->latest('id')
                                        ->get()
                                        ->count();
            }else{
                $users = AdminUser::latest('id')
                                    ->paginate(10);

                $usersCount = AdminUser::latest('id')
                                    ->get()
                                    ->count();
            }

            }else{
                if($request->search){
                    $search = $request->search;

                    $users = AdminUser::where('name','!=','MMcities')
                                            ->where('name','LIKE',$search.'%')
                                            ->latest('id')
                                            ->paginate(10);

                    $usersCount = AdminUser::where('name','!=','MMcities')
                                            ->where('name','LIKE',$search.'%')
                                            ->latest('id')
                                            ->get()
                                            ->count();

                }else{
                    $users = AdminUser::where('name','!=','MMcities')
                                            ->latest('id')
                                            ->paginate(10);

                    $usersCount = AdminUser::where('name','!=','MMcities')
                                            ->latest('id')
                                            ->get()
                                            ->count();
                }

            }


        return view('admins.user_managements.users.index',compact('users','usersCount','limit_user','count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auth_role_name = auth()->user()->getRoleNames();
        if($auth_role_name[0] == 'Superadmin')
        {
            $roles = Role::where('guard_name','admin_user')->get();
        }else{
            $roles = Role::where('name','!=','Superadmin')
                        ->where('guard_name','admin_user')
                        ->get();
        }
        return view('admins.user_managements.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:admin_users,name',
            'email' => 'required|email|unique:admin_users,email',
            'password' => 'required|same:password_confirmation',
            // 'profile_photo_path' => 'mimes:jpg,png,jpeg',
        ]);

            $user = new AdminUser;

            // if($request->file('profile_photo_path'))
            // {
            //     $image = $request->file('profile_photo_path');
            //     $imageName = time().'_'.$image->getClientOriginalName();

            //     $path = public_path('/photos/admin_users');
            //     $img = Image::make($image->path());
            //     $img->resize(300, 300, function ($constraint) {
            //         $constraint->aspectRatio();
            //     })->save($path.'/'.$imageName);

            //     $user->profile_photo_path = $imageName;
            // }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->created_by = auth()->user()->id;
            $user->status = 1;
            $user->save();

            // $user = CustomerLogin::create(
            //     [
            //         'guard_name' => 'customer_user',
            //         'name' => $request->name,
            //         'email' => $request->email,
            //         'tax_id' => $request->tax_id,
            //         'password' => Hash::make($request->password),
            //         'status' => 2
            //     ]);

            $user->assignRole($request->input('roles'));

            return back()->with('success', 'Created.');

            // return redirect()->route('admin.users.index')
            //     ->with('success', 'Created.');
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
        $user = AdminUser::find($id);

        $auth_role_name = auth()->user()->getRoleNames();
        if($auth_role_name[0] == 'Superadmin')
        {
            $roles = Role::where('guard_name','admin_user')->get();
        }else{
            $roles = Role::where('name','!=','Superadmin')
                        ->where('guard_name','admin_user')
                        ->get();
        }

        $userRole = $user->roles->pluck('name','name')->first();

        return view('admins.user_managements.users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:admin_users,email,' .$id,
            'password' => 'required|same:password_confirmation',
            // 'profile_photo_path' => 'mimes:jpg,png,jpeg',
        ]);

            $user = AdminUser::find($id);

            // if($user->profile_photo_path != null && $request->file('profile_photo_path')){
            //     if(file_exists(public_path('photos/admin_users/'.$user->profile_photo_path))){

            //         unlink('photos/admin_users/'.$user->profile_photo_path);

            //     }
            // }


            // if($request->file('profile_photo_path'))
            // {
            //     $image = $request->file('profile_photo_path');
            //     $imageName = time().'_'.$image->getClientOriginalName();

            //     $path = public_path('/photos/admin_users');
            //     $img = Image::make($image->path());
            //     $img->resize(300, 300, function ($constraint) {
            //         $constraint->aspectRatio();
            //     })->save($path.'/'.$imageName);

            //     $user->profile_photo_path = $imageName;
            // }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            // $user->created_by = auth()->user()->id;

            $user->save();

            DB::table('model_has_roles')->where('model_id',$id)->delete();

            $user->assignRole($request->input('roles'));

            return redirect()->route('admin.users.index')
            ->with('success', 'Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = AdminUser::find($id);

        $user->delete();

        return back()->with('success','Deleted.');
    }

    public function changePasswordPage($id)
    {
        return view('admins.user_managements.users.change_password',compact('id'));
    }

    public function changePassword(Request $request,$id)
    {
        Validator::make($request->all(),[
            "old_password" => "required|min:6|max:10",
            "new_password" => "required|min:6|max:10",
            "password_confirmation" => "required|min:6|max:10|same:new_password",
        ])->validate();

        $user = AdminUser::select('password')->where('id',$id)->first();

        $db_hash_value = $user->password;

        if(Hash::check($request->old_password,$db_hash_value))
        {
            $user = AdminUser::where('id',$id)->first();
            $user->password = Hash::make($request->new_password);
            $user->save();

            // Auth::guard('customer_user')->logout();

            return redirect()->route('admin.users.index')->with('success','Password Changed Successfully!');
        }

        return back()->with(['notMatch'=>'The old password does not match.Try Again.']);
    }

    public function increaseCountPage($id)
    {
        $user = AdminUser::find($id);
        $userRole = $user->roles->pluck('name','name')->first();
        return view('admins.user_managements.users.increase_count',compact('user','userRole'));
    }

    public function increaseCount(Request $request,$id)
    {
        $user = AdminUser::find($id);
        $user->limit_user = $request->limit_user;
        $user->save();

        return redirect()->route('admin.users.index')->with('success','Count Increase Successfully.');
    }

    public function approve($id)
    {
        $user = AdminUser::find($id);
        $user->status = 1;
        $user->save();

        return back()->with('success','Approved Successfully.');
    }

    public function pendingPage(Request $request)
    {
        $auth_role_name = auth()->user()->getRoleNames();
        if($auth_role_name[0] == 'Superadmin')
        {
            if($request->search){
                $search = $request->search;

                $users = AdminUser::where('name','LIKE',$search.'%')
                                        ->where('status',0)
                                        ->latest('id')
                                        ->paginate(10);

                $usersCount = AdminUser::where('name','LIKE',$search.'%')
                                        ->where('status',0)
                                        ->latest('id')
                                        ->get()
                                        ->count();
            }else{
                $users = AdminUser::latest('id')
                                ->where('status',0)
                                ->paginate(10);

                $usersCount = AdminUser::latest('id')
                                ->where('status',0)
                                ->get()
                                ->count();
            }

            }else{
                if($request->search){
                    $search = $request->search;

                    $users = AdminUser::where('name','!=','MMcities')
                                            ->where('name','LIKE',$search.'%')
                                            ->where('status',0)
                                            ->latest('id')
                                            ->paginate(10);

                    $usersCount = AdminUser::where('name','!=','MMcities')
                                            ->where('name','LIKE',$search.'%')
                                            ->where('status',0)
                                            ->latest('id')
                                            ->get()
                                            ->count();

                }else{
                $users = AdminUser::where('name','!=','MMcities')
                    ->where('status',0)
                    ->latest('id')
                    ->paginate(10);

                $usersCount = AdminUser::where('name','!=','MMcities')
                    ->where('status',0)
                    ->latest('id')
                    ->get()
                    ->count();
                }
        }


        return view('admins.user_managements.users.pending',compact('users','usersCount'));
    }
}
