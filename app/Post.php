<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function path()
    {
        return '/posts/' . $this->id;
    }
    public function creator()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
