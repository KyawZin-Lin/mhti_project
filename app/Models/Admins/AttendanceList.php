<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\Student;
use App\Models\Admins\Classroom;
use App\Models\Admins\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttendanceList extends Model
{
    use HasFactory;

    protected $table = "attendance_lists";
    protected $fillable = [
        "date",
        "classroom_id",
        "student_id",
        "academic_year_id",
        "admin_user_id",
        "remark"
    ];

    public function classroom(){
        return $this->belongsTo(Classroom::class,'classroom_id','id');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }

    public function academicYear(){
        return $this->belongsTo(AcademicYear::class,'academic_year_id','id');
    }

    public function AdminUser(){
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
