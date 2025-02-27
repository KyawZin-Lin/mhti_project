<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\Student;
use App\Models\Admins\Classroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absent extends Model
{
    use HasFactory;

    protected $table = "absents";
    protected $fillable = [
        "date",
        "classroom_id",
        "student_id",
        "admin_user_id",
        "remark"
    ];

    public function classroom(){
        return $this->belongsTo(Classroom::class,'classroom_id','id');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }

    public function AdminUser(){
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
