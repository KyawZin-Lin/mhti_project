<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Models\AdminUser;
use App\Models\Admins\Batch;
use Illuminate\Http\Request;
use App\Models\Admins\Degree;
use App\Models\Admins\Teacher;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Contracts\Auth\StatefulGuard;

class AdminRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $guard;

    public function __construct(StatefulGuard $guard) {
        $this->guard = $guard;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('name','!=','Superadmin')
                        ->where('guard_name','admin_user')->get();
        $courses = Degree::get();
        $batches = Batch::get();
        return view('admins.auth.register',compact('roles','courses','batches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
    ])->validate();

    $user = new AdminUser;

    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->status = 0;
    $user->save();

    $user->assignRole($request->input('roles'));

    if($user){
        $teacher = new Teacher;
        if($request->file("photo")) {
            $file=$request->file("photo");
            $filename = time().'_'.$file->getClientOriginalName();
            $path=public_path('photos/teachers/photos');
            $img = Image::make($file);
            $img->resize(300, 300, function ($const) {
            $const->aspectRatio();
            })->save($path.'/'.$filename);

            $teacher->photo = $filename;
        }

        $teacher->name = $request->name;
        $teacher->phone = $request->phone;
        $teacher->course_id = $request->course_id;
        $teacher->batch_id = $request->batch_id;
        $teacher->address = $request->address;
        $teacher->admin_user_id = $user->id;
        $teacher->save();
    }

        // Auth::guard('admin_user')->login($user);
        return redirect()->route('admin.dashboard');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
