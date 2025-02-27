<?php

namespace App\Models\Users;

use App\Models\User;
use App\Models\Admins\Student;
use App\Models\Admins\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentAnswer extends Model
{
    use HasFactory;

    protected $table = "student_answers";
    protected $fillable = [
        "question_id",
        "student_id",
        "answer",
        "user_id"
    ];

    public function question(){
        return $this->belongsTo(Question::class,'question_id','id');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
