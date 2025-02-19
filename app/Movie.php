<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable=['title','description'];
    public function shows()
    {
        return $this->hasMany(Show::class, 'movie_id', 'id');
    }
}
