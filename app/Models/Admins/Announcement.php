<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdminUser;

class Announcement extends Model
{
    use HasFactory;

    protected $table = "announcements";
    protected $fillable = [
        "title",
        "photo",
        "description",
        "admin_user_id"
    ];

    public function adminUser(){
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
