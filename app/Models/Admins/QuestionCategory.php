<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\Course;
use App\Models\Admins\Module;
use App\Models\Admins\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionCategory extends Model
{
    use HasFactory;

    protected $table = "question_categories";
    protected $fillable = [
        "name",
        "academic_year_id",
        "module_id",
        "course_id",
        "status",
        "created_by",
        "remarks",
        "admin_user_id"
    ];

    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function academicYear(){
        return $this->belongsTo(AcademicYear::class,'academic_year_id','id');
    }

    public function module(){
        return $this->belongsTo(Module::class,'module_id','id');
    }

    public function AdminUser(){
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
