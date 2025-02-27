<?php

namespace App\Models\Admins;

use App\Models\Admins\Building;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Floor extends Model
{
    use HasFactory;

    protected $table = "floors";
    protected $fillable = [
        "name",
        "building_id"
    ];

    public function building(){
        return $this->belongsTo(Building::class,'building_id','id');
    }
}
