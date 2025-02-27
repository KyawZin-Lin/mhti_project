<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\Job;
use App\Models\Admins\Batch;
use App\Models\Admins\State;
use App\Models\Admins\Course;
use App\Models\Admins\Degree;
use App\Models\Admins\NrcInfo;
use App\Models\Admins\Township;
use App\Models\Admins\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $table = "teachers";
    protected $fillable = [
        "ref_no",
        "name",
        "email",
        "phone",
        "nrc",
        "nrc_info_id",
        "gender",
        "position",
        "dob",
        "degree_id",
        "job_id",
        "course_id",
        "batch_id",
        "degree",
        "academic_year_id",
        "address",
        "township_id",
        "state_id",
        "photo",
        "approve_by",
        "approve_status",
        "status",
        "duty_assign",
        "degree_id",
        "remarks",
        "topik_level",
        "standard_salary",
        "admin_user_id",
    ];

    public function course()
    {
        return $this->belongsTo(Degree::class,'course_id','id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class,'batch_id','id');
    }

    public function academicYear(){
        return $this->belongsTo(AcademicYear::class,'academic_year_id','id');
    }

    public function job(){
        return $this->belongsTo(Job::class,'job_id','id');
    }

    public function adminUser(){
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }

    public function state(){
        return $this->belongsTo(State::class,'state_id','id');
    }

    public function township(){
        return $this->belongsTo(Township::class,'township_id','id');
    }

    public function nrcInfo(){
        return $this->belongsTo(NrcInfo::class,'nrc_info_id','id');
    }
}
