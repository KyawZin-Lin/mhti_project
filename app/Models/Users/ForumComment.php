<?php

namespace App\Models\Users;

use App\Models\Admins\Forum;
use App\Models\Admins\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ForumComment extends Model
{
    use HasFactory;

    protected $table = "forum_comments";
    protected $fillable = [
        "student_id",
        "forum_id",
        "comment",
    ];

    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }

    public function forum(){
        return $this->belongsTo(Forum::class,'forum_id','id');
    }
}
