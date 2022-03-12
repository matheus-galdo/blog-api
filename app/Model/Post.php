<?php

namespace App\Model;

use App\model\User;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected  $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'author'
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'author');
    }
}
