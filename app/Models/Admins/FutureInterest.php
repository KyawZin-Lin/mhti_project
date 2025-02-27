<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FutureInterest extends Model
{
    use HasFactory;

    protected $table = "future_interests";
    protected $fillable = [
        "name",
    ];
}
