<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = [
        'id',
        
        'created_at'
    ];

    /**
     * 投稿はユーザーに属すため
     * 多対一
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
