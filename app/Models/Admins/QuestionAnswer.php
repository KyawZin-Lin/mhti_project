<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionAnswer extends Model
{
    use HasFactory;

    protected $table = "question_answers";
    protected $fillable = [
        "question_id",
        "answer",
        "status",
        "admin_user_id"
    ];

    public function question(){
        return $this->belongsTo(Question::class,'question_id','id');
    }

    public function AdminUser(){
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
