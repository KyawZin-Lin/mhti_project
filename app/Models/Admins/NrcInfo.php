<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NrcInfo extends Model
{
    use HasFactory;

    protected $table = "nrc_infos";
    protected $fillable = [
        "no",
        "nrc_abbreviation"
    ];
}
