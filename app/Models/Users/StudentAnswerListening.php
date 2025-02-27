<?php

namespace App\Models\Users;

use App\Models\Admins\Student;
use App\Models\Admins\Question;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admins\QuestionListening;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentAnswerListening extends Model
{
    use HasFactory;

    protected $table = "student_answer_listenings";
    protected $fillable = [
        "question_id",
        "student_id",
        "answer",
        "user_id"
    ];

    public function question(){
        return $this->belongsTo(QuestionListening::class,'question_id','id');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }

}
