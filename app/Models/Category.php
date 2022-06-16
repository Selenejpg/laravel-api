<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'label', 'color'
    ];

    public function Posts(){
        return $this->hasMany('App\Models\Post');
    }
}
