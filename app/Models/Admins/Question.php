<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\QuestionCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $table = "questions";
    protected $fillable = [
        "question_name",
        "title",
        "reading_type",
        "qcategory_id",
        "qtype",
        "answer_reason",
        "true_answer",
        "mark",
        "audio_file",
        "photo",
        "student_category",
        "created_by",
        "status",
        "remarks",
        "admin_user_id"
    ];

    public function questionCategory(){
        return $this->belongsTo(QuestionCategory::class,'qcategory_id','id');
    }

    public function AdminUser(){
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
