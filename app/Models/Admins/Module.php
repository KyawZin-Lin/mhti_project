<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $table = "modules";
    protected $fillable = [
        "name",
        "course_id",
        "status",
        "remarks",
        "admin_user_id"
    ];

    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function adminUser(){
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
