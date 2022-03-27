<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title_post', 'description_post',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
