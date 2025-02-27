<?php

namespace App\Models\Admins;

use App\Models\Admins\Student;
use App\Models\Admins\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnnouncementComment extends Model
{
    use HasFactory;

    protected $table = "announcement_comments";
    protected $fillable = [
        "student_id",
        "announcement_id",
        "comment",
    ];

    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }

    public function announcement(){
        return $this->belongsTo(Announcement::class,'announcement_id','id');
    }
}
