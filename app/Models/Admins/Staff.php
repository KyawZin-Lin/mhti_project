<?php

namespace App\Models\Admins;

use App\Models\AdminUser;
use App\Models\Admins\PaymentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory;

    protected $table = "staff";
    protected $fillable = [
        "name",
        "position",
        "nrc",
        "phone",
        "address",
        "salary_date",
        "salary",
        "payment_type_id",
        "start_date",
        "end_date",
        "status",
        "standard_salary",
        "admin_user_id"
    ];

    public function paymentType(){
        return $this->belongsTo(PaymentType::class,'payment_type_id','id');
    }

    public function adminUser(){
        return $this->belongsTo(AdminUser::class,'admin_user_id','id');
    }
}
