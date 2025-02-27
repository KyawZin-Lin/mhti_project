<?php

namespace App\Models\Admins;

use App\Models\Admins\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Township extends Model
{
    use HasFactory;

    protected $table = "townships";
    protected $fillable = [
        "name",
        "state_id"
    ];

    public function state(){
        return $this->belongsTo(State::class,'state_id','id');
    }
}
