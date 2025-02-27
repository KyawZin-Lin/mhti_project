<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentMedicalStatus extends Model
{
    use HasFactory;

    protected $table = "student_medical_statuses";
    protected $fillable = [
        "student_id",
        "medical_status",
        "admin_user_id"
    ];

    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }

    public function adminUser(){
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
