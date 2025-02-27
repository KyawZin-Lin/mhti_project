<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\Room;
use App\Models\Admins\Degree;
use App\Models\Admins\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Batch extends Model
{
    use HasFactory;

    protected $table = "batches";
    protected $fillable = [
        "academic_year_id",
        "batch",
        "student_qty",
        "enrolled_student",
        "room_id",
        "time",
        "duration",
        "start_date",
        "end_date",
        "degree_id", // for course
        "admin_user_id"
    ];

    public function room(){
        return $this->belongsTo(Room::class,'room_id','id');
    }

    public function academicYear(){
        return $this->belongsTo(AcademicYear::class,'academic_year_id','id');
    }

    public function degree(){
        return $this->belongsTo(Degree::class,'degree_id','id');
    }

    public function adminUser(){
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
