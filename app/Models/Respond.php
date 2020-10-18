<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respond extends Model
{
    use HasFactory;

    public function contact(){
        return $this->belongsTo(Contact::class);
    }
    public function attachements(){
        return $this->hasMany(Attachement::class);
    }
}
