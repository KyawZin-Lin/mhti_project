<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admins\Classroom;
use App\Models\Admins\Absent;

class AbsentClassroom extends Model
{
    use HasFactory;

    protected $table = "absent_classrooms";
    protected $fillable = [
        "absent_id",
        "classroom_id",
    ];

    public function absent(){
        return $this->belongsTo(Absent::class,'absent_id','id');
    }

    public function classroom(){
        return $this->belongsTo(Classroom::class,'classroom_id','id');
    }


}
