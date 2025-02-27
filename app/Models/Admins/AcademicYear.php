<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\Degree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicYear extends Model
{
    use HasFactory;

    protected $table = "academic_years";
    protected $fillable = [
        "name",
        "times",
        "degree_id",
        "remarks",
        "admin_user_id"
    ];


    public function degree(){
        return $this->belongsTo(Degree::class,'degree_id','id');
    }

    public function adminUser(){
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
