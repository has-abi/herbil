<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'title',
      'content',
      'user',
      'status',
      'thumbnail',
      'creadted_at',
      'updated_at'
    ];
    use HasFactory;

    public function categories(){
        return $this->belongsToMany("App\Models\Categorie","categorie_post","post_id","categorie_id");
    }
}
