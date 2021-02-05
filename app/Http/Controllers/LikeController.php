<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Person;

class LikeController extends Controller
{
    public function like(Person $person, Post $post){
        dd($post);
    }
}
