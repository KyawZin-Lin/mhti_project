<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentLimit extends Model
{
    use HasFactory;

    protected $table="student_limits";
    protected $fillable = [
        "limit_student",
        "admin_user_id"
    ];

    public function adminUser(){
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
