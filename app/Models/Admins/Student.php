<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\Batch;
use App\Models\Admins\State;
use App\Models\Admins\Course;
use App\Models\Admins\Degree;
use App\Models\Admins\NrcInfo;
use App\Models\Admins\Township;
use App\Models\Admins\Classroom;
use App\Models\Admins\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";
    protected $fillable = [
        "ref_no",
        "date",
        "start_date",
        "end_date",
        "course_registered",
        "name",
        "student_id",
        "vr_no",
        "student_no",
        "additional_course_id",
        "additional_student_no",
        "course_no",
        "course_abbre",
        "national_id",
        "student_category",
        "degree_id",
        "classroom_id",
        "batch_id",
        "email",
        "phone",
        "mobile",
        "exam_id",
        "exam_photo",
        "passport_photo",
        "nrc_front",
        "nrc_back",
        "nrc",
        "nrc_info_id",
        "gender",
        "age",
        "nationality",
        "religion",
        "marital_status",
        "dob",
        "course_id",
        "address",
        "township_id",
        "state_id",
        "photo",
        "academic_year_id",
        "father_name",
        "mother_name",
        "approve_by",
        "approve_status",
        "status",
        "exp",
        "topik_level",
        "remarks",
        "admin_user_id",
        "education",
        "qualification",
        "english_language",
        "other_language",
        "student_status",
        "business_type",
        "position",
        "duties",
        "pay",
        "payment_complete",
        "leaving",
        "future_interest",
        "source_survey",
        "oversea",
        "remark",
        "applicant",
        "applicant_sign",
        "registered",
        "registered_sign",
        "open_day",
        "close_day",
        "location",
    ];


    public function academicYear(){
        return $this->belongsTo(AcademicYear::class,'academic_year_id','id');
    }

    public function classroom(){
        return $this->belongsTo(Classroom::class,'classroom_id','id');
    }

    public function batch(){
        return $this->belongsTo(Batch::class,'batch_id','id');
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

    public function degree(){
        return $this->belongsTo(Degree::class,'degree_id','id');
    }

    public function course(){
        return $this->belongsTo(Degree::class,'additional_course_id','id');
    }
}
