<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //テーブル名
    protected $table = 'tests';

    //可変項目
    protected $fillable = 
    [
        'title',
        'content'
    ];

}
