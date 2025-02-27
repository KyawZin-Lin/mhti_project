<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\Batch;
use App\Models\Admins\Staff;
use App\Models\Admins\Degree;
use App\Models\Admins\Teacher;
use App\Models\Admins\PaymentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expend extends Model
{
    use HasFactory;

    protected $table = "expends";
    protected $fillable = [
        "date",
        "title",
        "description",
        "teacher_id",
        "staff_id",
        "course_id",
        "batch_id",
        "payment_type_id",
        "particular",
        "voucher_no",
        "name",
        "amount",
        "qty",
        "price",
        "thing",
        "sign",
        "remark",
        "bonus",
        "fine",
        "admin_user_id"
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id','id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id','id');
    }

    public function course()
    {
        return $this->belongsTo(Degree::class,'course_id','id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class,'batch_id','id');
    }

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class,'payment_type_id','id');
    }

    public function adminUser()
    {
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
