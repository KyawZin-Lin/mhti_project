<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\Batch;
use App\Models\Admins\Degree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseFee extends Model
{
    use HasFactory;

    protected $table = "course_fees";

    protected $fillable = [
        "course_id",
        "batch_id",
        "amount",
        "discount",
        "status",
        "admin_user_id"
    ];

    public function course()
    {
        return $this->belongsTo(Degree::class,'course_id','id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class,'batch_id','id');
    }

    public function adminUser()
    {
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
