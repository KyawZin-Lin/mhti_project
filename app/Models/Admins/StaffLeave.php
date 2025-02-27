<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\Staff;
use App\Models\Admins\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StaffLeave extends Model
{
    use HasFactory;

    protected $table = "staff_leaves";
    protected $fillable = [
        "teacher_id",
        "staff_id",
        "date",
        "fine",
        "note",
        "admin_user_id"
    ];

    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id','id');
    }

    public function staff(){
        return $this->belongsTo(Staff::class,'staff_id','id');
    }

    public function adminUser(){
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
