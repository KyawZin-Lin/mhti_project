<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeacherAttendance extends Model
{
    use HasFactory;

    protected $table = "teacher_attendances";
    protected $fillable = [
        "date",
        "teacher_id",
        "note",
        "admin_user_id",
    ];


    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id','id');
    }

    public function adminUser(){
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
