<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Models\Admins\Student;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:dashboard-page', ['only' => ['dashboard']]);
    }


    public function dashboard(){
        $students = Student::all();
        return view('admins.dashboard',compact('students'));
    }

    public function userguide(){
        return view('admins.user_guide');
    }
}
