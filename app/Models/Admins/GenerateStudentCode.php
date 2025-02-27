<?php

namespace App\Models\Admins;

use App\Models\Admins\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GenerateStudentCode extends Model
{
    use HasFactory;

    protected $table = "generate_student_codes";
    protected $fillable = [
        "course_id",
        "student_no",
        "course_no",
        "course_abbre",
        "status",
    ];

    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }
}
