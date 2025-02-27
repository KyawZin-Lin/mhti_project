<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Models\Admins\Student;
use App\Models\Admins\Teacher;
use App\Http\Controllers\Controller;

class LogHistoryController extends Controller
{

    function __construct()
     {
          $this->middleware('permission:log-history', ['only' => ['index']]);
     }

    public function index()
    {
        $students = Student::whereColumn('created_at','<>','updated_at')
                            ->whereNot('admin_user_id','<>',1)
                            ->latest('id')
                            ->paginate(10);

        $teachers = Teacher::whereColumn('created_at','<>','updated_at')
                            ->whereNot('admin_user_id','<>',1)
                            ->latest('id')
                            ->paginate(10);
        return view('admins.log_hostories.index',compact('students','teachers'));
    }
}
