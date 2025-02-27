<?php

namespace App\Models\Admins;

use App\Models\Admins\Income;
use App\Models\Admins\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IncomeDetail extends Model
{
    use HasFactory;

    protected $table = "income_details";
    protected $fillable = [
        "income_id",
        "student_id",
        "code",
        "description",
        "amount"
    ];

    public function income(){
        return $this->belongsTo(Income::class,'income_id','id');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
}
