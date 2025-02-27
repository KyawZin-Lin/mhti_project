<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $table = "courses";
    protected $fillable = [
        "name",
        "abbreviation",
        "audio_file",
        "academic_year_id",
        "remarks",
        "admin_user_id"
    ];


    public function academicYear(){
        return $this->belongsTo(AcademicYear::class,'academic_year_id','id');
    }

    public function adminUser(){
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
