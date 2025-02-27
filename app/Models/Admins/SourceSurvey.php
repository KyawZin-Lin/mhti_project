<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SourceSurvey extends Model
{
    use HasFactory;

    protected $table = "source_surveys";
    protected $fillable = [
        "name",
    ];
}
