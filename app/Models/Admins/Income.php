<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\Batch;
use App\Models\Admins\Degree;
use App\Models\Admins\Student;
use App\Models\Admins\PaymentType;
use App\Models\Admins\IncomeSource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "incomes";
    protected $fillable = [
        "date",
        "student_id",
        "course_id",
        "batch_id",
        "income_source_id",
        "title",
        "code",
        "payment_type",
        "payment_installment",
        "payment_complete",
        "particular",
        "voucher_no",
        "student_no",
        "course_abbre",
        "course_no",
        "group",
        "amount",
        "left_money",
        "remark",
        "paid_by",
        "received_by",
        "checked_by",
        "admin_user_id",
        "status"
    ];

    public function course()
    {
        return $this->belongsTo(Degree::class,'course_id','id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class,'batch_id','id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class,'payment_type','id');
    }

    public function incomeSource()
    {
        return $this->belongsTo(IncomeSource::class,'income_source_id','id');
    }

    public function adminUser()
    {
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
