<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalStatus extends Model
{
    use HasFactory;

    protected $table = "medical_statuses";
    protected $fillable = [
        "name",
        "times",
        "admin_user_id"
    ];

    public function adminUser(){
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
