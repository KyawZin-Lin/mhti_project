<?php

namespace App\Models\Admins;

use App\Models\Admins\Floor;
use App\Models\Admins\Building;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $table = "rooms";
    protected $fillable = [
        "name",
        "floor_id",
        "building_id"
    ];

    public function floor(){
        return $this->belongsTo(Floor::class,'floor_id','id');
    }

    public function building(){
        return $this->belongsTo(Building::class,'building_id','id');
    }
}
