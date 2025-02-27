<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\QuestionCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionListening extends Model
{
    use HasFactory;

    protected $table = "question_listenings";
    protected $fillable = [
        "question_name",
        "title",
        "listening_type",
        "qcategory_id",
        "qtype",
        "answer_reason",
        "true_answer",
        "mark",
        "audio_file",
        "q_photo",
        "student_category",
        "created_by",
        "status",
        "remarks",
        "answer1",
        "answer2",
        "answer3",
        "answer4",
        "answer_photo1",
        "answer_photo2",
        "answer_photo3",
        "answer_photo4",
        "admin_user_id"
    ];

    public function questionCategory(){
        return $this->belongsTo(QuestionCategory::class,'qcategory_id','id');
    }

    public function AdminUser(){
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
