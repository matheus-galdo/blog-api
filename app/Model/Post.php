<?php

namespace App\Model;

use App\model\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected  $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'posts_categories');
    }
}
