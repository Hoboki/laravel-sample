<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public static function boot()
    {
        parent::boot();
        self::deleting(function($person){
            $posts = $person->posts;
            foreach($posts as $post){
                $post->delete();
            }
        });
    }
    protected $guarded = ['id','created_at'];

    /**
     * 投稿はユーザーに属すため
     * 一対多
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function like_posts()
    {
        return $this->belongsToMany(Post::class);
    }

}
