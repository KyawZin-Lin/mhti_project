<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Admins\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Admins\StudentMedicalStatus;
use Illuminate\Contracts\Auth\StatefulGuard;

class UserLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $guard;

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function index()
    {
        //
    }

    public function loginPage()
    {
        return view('users.auth.login');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if (Auth::user()) {
        //     return redirect('user/announcements');
        // } else {
        //     return view('users.auth.login');
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password,'status' => 1])) {
            return redirect()->route('user.announcements');
        }else{
            return back()->withErrors(['error'=>'crediential doesnot match']);
        }
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
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('user/login');
    }

    public function profile()
    {
        $student = Student::where('id',auth()->user()->student_id)->first();
        $studentMedicalStatuses = StudentMedicalStatus::where('student_id',auth()->user()->student_id)->get();
        return view('users.auth.profile',compact('student','studentMedicalStatuses'));
    }
}
