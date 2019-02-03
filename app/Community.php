<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    public function post()
    {
        return $this->hasMany(Post::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
